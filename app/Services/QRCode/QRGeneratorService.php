<?php

declare(strict_types=1);

namespace App\Services\QRCode;

use App\Http\Requests\Contracts\CreateQRModelInterface;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeNone;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Writer\Result\ResultInterface;

class QRGeneratorService implements QRGeneratorServiceInterface
{

    /**
     * @param CreateQRModelInterface $model
     */
    public function generate(CreateQRModelInterface $model): ResultInterface
    {
        return Builder::create()
            ->writer(new PngWriter())
            ->writerOptions([])
            ->data($model->getQRContent())
            ->encoding(new Encoding('UTF-8'))
            ->errorCorrectionLevel(new ErrorCorrectionLevelLow())
            ->size($model->getSize())
            ->margin(0)
            ->roundBlockSizeMode(new RoundBlockSizeModeNone())
            ->foregroundColor($model->getFillColor())
            ->backgroundColor($model->getBackgroundColor())
            ->build();

    }
}
