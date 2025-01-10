<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Services\PayOSService;
use Illuminate\Support\Facades\Log;

class PayOSController extends Controller
{
    protected $payOSService;
    public function __construct(PayOSService $payOSService)
    {
        $this->payOSService = $payOSService;
    }

    // Tạo link thanh toán
    public function createPayment(Request $request)
    {
        try {
            $orderCode = intval(substr(strval(microtime(true) * 10000), -6));
            // Dữ liệu thanh toán
            $data = [
                "orderCode" => $orderCode,
                "amount" => floatval($request->amount),  // Amount từ form
                "description" => "Thanh toán gói nạp tiền",
                "items" => [
                    [
                        "name" => "Gói nạp tiền",
                        "quantity" => 1,
                        "price" => floatval($request->amount)
                    ]
                ],
                "returnUrl" => route('nap-tien', [
                    'amount' => $request->amount,
                    'status' => 'PAID'
                ]),
                "cancelUrl" => route('nap-tien', [
                    'amount' => $request->amount,
                    'status' => 'CANCELLED'
                ])
            ];

            $payOSService = new PayOSService();
            $response = $payOSService->createPaymentLink($data);

            // Log phản hồi chi tiết để kiểm tra
            Log::debug('PayOS Response:', ['response' => $response]);

            // Kiểm tra nếu có checkoutUrl và thực hiện redirect
            if (isset($response['checkoutUrl'])) {
                return redirect($response['checkoutUrl']);
            } else {
                // Hiển thị lỗi nếu không có checkoutUrl
                return response()->json(['error' => 'Không thể tạo link thanh toán', 'details' => $response], 500);
            }
        } catch (\Throwable $th) {
            // Log lỗi chi tiết và hiển thị thông báo
            Log::error('Error creating payment link:', ['error' => $th->getMessage(), 'trace' => $th->getTraceAsString()]);
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }


    // Lấy thông tin thanh toán của đơn hàng
    public function getPaymentInfo($orderCode)
    {
        $response = $this->payOSService->getPaymentLinkInformation($orderCode);
        return response()->json($response);
    }

    // Hủy link thanh toán
    public function cancelPayment($orderCode)
    {
        $reason = "Hủy đơn hàng"; // Lý do hủy đơn
        $response = $this->payOSService->cancelPaymentLink($orderCode, $reason);
        return response()->json($response);
    }
}
