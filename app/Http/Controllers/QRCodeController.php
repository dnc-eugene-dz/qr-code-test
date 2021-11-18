<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\QRCodeRequest;
use App\Services\QRCode\QRGeneratorServiceInterface;

class QRCodeController extends Controller
{
    /**
     * @var QRGeneratorServiceInterface
     */
    private QRGeneratorServiceInterface $qrGeneratorService;

    /**
     * @param QRGeneratorServiceInterface $qrGeneratorService
     */
    public function __construct(
        QRGeneratorServiceInterface $qrGeneratorService
    ) {
        $this->qrGeneratorService = $qrGeneratorService;
    }

    public function generate(QRCodeRequest $request): string
    {
        $result = $this->qrGeneratorService->generate($request);
        return base64_encode($result->getString());
    }
}
