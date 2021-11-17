<?php

declare(strict_types=1);

namespace App\Repositories\QRCode;

use App\Http\Requests\Contracts\CreateQRModelInterface;
use Endroid\QrCode\Writer\Result\ResultInterface;

interface QRCodeRepositoryInterface
{
    public function create(CreateQRModelInterface $model): ResultInterface;
}
