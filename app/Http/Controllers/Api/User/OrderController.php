<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\User\OrderRepository;
use App\Helpers\ExceptionHandlerHelper;
use App\Traits\ResponseTrait;
use illuminate\Support\Facades\Auth;
use App\Http\Requests\Api\User\OrderRequest;
use App\Models\Order;
use App\Mail\OrderShipped;
use App\Mail\cancelBooking;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\Package;
use App\Models\OrderItem;
use PDF;

class OrderController extends Controller
{
    use ResponseTrait;
    private $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }
    public function generatePdf($id)
    {
        // Fetch the order with its items
        $order = Order::with('orderItems')->findOrFail($id);

        // Load the view with order data
        $html = view('pdf.order', compact('order'))->render();

        // Generate the PDF
        $pdf = PDF::loadHTML($html);

        // Return the PDF as a stream for download
        return $pdf->download('order_details.pdf');
    }
    public function orderDetailStore(OrderRequest $request)
    {
        return ExceptionHandlerHelper::tryCatch(function () use ($request) {
            $data = array_merge($request->all());
            $order = $this->orderRepository->storeOrder($data);
            // $adminEmail = User::where('id', 1)->pluck('email')->first();

            // Mail::to($data['email'])->send(new OrderShipped($order));
            // Mail::to($adminEmail)->send(new OrderShipped($order));

            return $this->sendResponse($order, 'order create successfully');
        });
    }

    public function index()
    {
        return ExceptionHandlerHelper::tryCatch(function ()  {

            $bookings = $this->orderRepository->index();
            return $this->sendResponse($bookings, 'All bookings');
        });
    }

    public function update(Request $request, $id)
    {
        return ExceptionHandlerHelper::tryCatch(function () use($request,$id) {

            $data = array_merge($request->all());
            $booking = $this->orderRepository->update($data,$id);
            return $this->sendResponse($booking, 'Booking Updated Successfully');
        });
    }
    
    public function updateStatus(Request $request, $reference_id) {
        return ExceptionHandlerHelper::tryCatch(function () use($request,$reference_id) {

            $data = array_merge($request->all());
            $booking = $this->orderRepository->updateStatus($data,$reference_id);

            $adminEmail = User::where('id', 1)->pluck('email')->first();

            Mail::to($data['email'])->send(new OrderShipped($booking));
            Mail::to($adminEmail)->send(new OrderShipped($booking));

            return $this->sendResponse($booking, 'Booking Updated Successfully');
        });
    }

    public function cancel($id)
    {
        return ExceptionHandlerHelper::tryCatch(function () use($id) {
            $booking = $this->orderRepository->cancel($id);
            return $this->sendResponse($booking, 'Details');
        });
    }


}