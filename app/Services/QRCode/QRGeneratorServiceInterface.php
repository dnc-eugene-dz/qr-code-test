<?php

declare(strict_types=1);

namespace App\Services\QRCode;

use App\Http\Requests\Contracts\CreateQRModelInterface;
use Endroid\QrCode\Writer\Result\ResultInterface;

interface QRGeneratorServiceInterface
{
    public function generate(CreateQRModelInterface $model): ResultInterface;
}
