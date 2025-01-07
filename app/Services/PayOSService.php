<?php

namespace App\Services;

use PayOS\PayOS;

class PayOSService
{
    protected $payOS;

    public function __construct()
    {
        // Khởi tạo đối tượng PayOS với thông tin cấu hình
        $this->payOS = new PayOS(
            config('payos.client_id'),
            config('payos.api_key'),
            config('payos.checksum_key')
        );
    }

    // Phương thức tạo link thanh toán
    public function createPaymentLink(array $data)
    {
        try {
            $response = $this->payOS->createPaymentLink($data);
            return $response;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    // Phương thức lấy thông tin thanh toán
    public function getPaymentLinkInformation($orderCode)
    {
        try {
            $response = $this->payOS->getPaymentLinkInformation($orderCode);
            return $response;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    // Phương thức hủy link thanh toán
    public function cancelPaymentLink($orderCode, $reason)
    {
        try {
            $response = $this->payOS->cancelPaymentLink($orderCode, $reason);
            return $response;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
