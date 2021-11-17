<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\QRCodeRequest;
use App\Repositories\QRCode\QRCodeRepositoryInterface;

class QRCodeController extends Controller
{
    /**
     * @var \App\Repositories\QRCode\QRCodeRepositoryInterface
     */
    private QRCodeRepositoryInterface $QRCodeRepository;

    /**
     * @param \App\Repositories\QRCode\QRCodeRepositoryInterface $QRCodeRepository
     */
    public function __construct(
        QRCodeRepositoryInterface $QRCodeRepository
    ) {
        $this->QRCodeRepository = $QRCodeRepository;
    }

    public function generate(QRCodeRequest $request)
    {
        $result = $this->QRCodeRepository->create($request);
        return base64_encode($result->getString());
    }
}
