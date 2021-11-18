<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\QRCodeRequest;
use App\Repositories\QRCode\QRCodeRepositoryInterface;

class QRCodeController extends Controller
{
    /**
     * @var QRCodeRepositoryInterface
     */
    private QRCodeRepositoryInterface $qrCodeRepository;

    /**
     * @param QRCodeRepositoryInterface $qrCodeRepository
     */
    public function __construct(
        QRCodeRepositoryInterface $qrCodeRepository
    ) {
        $this->qrCodeRepository = $qrCodeRepository;
    }

    public function generate(QRCodeRequest $request): string
    {
        $result = $this->qrCodeRepository->create($request);
        return base64_encode($result->getString());
    }
}
