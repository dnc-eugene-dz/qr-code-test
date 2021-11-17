<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Http\Requests\Contracts\CreateQRModelInterface;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Color\ColorInterface;
use Illuminate\Foundation\Http\FormRequest;

class QRCodeRequest extends FormRequest implements CreateQRModelInterface
{
    public function rules(): array
    {
        $rgbRule = 'required|integer|max:255';
        return [
            'content' => 'required|string|max:255',
            'size' => 'required|integer|min:60',
            'fill_color' => 'required|array|size:4',
            'background_color' => 'required|array|size:4',
            'fill_color.r' => $rgbRule,
            'background_color.r' => $rgbRule,
            'fill_color.g' => $rgbRule,
            'background_color.g' => $rgbRule,
            'fill_color.b' => $rgbRule,
            'background_color.b' => $rgbRule,
            'fill_color.a' => 'required|numeric|between:0,1',
            'background_color.a' => 'required|numeric|between:0,1'
        ];
    }

    public function getSize(): int
    {
        return (int) $this->input('size');
    }

    public function getFillColor(): ColorInterface
    {
        $colorArray = $this->input('fill_color');
        return  new Color($colorArray['r'], $colorArray['g'], $colorArray['b'], $colorArray['a']);
    }

    public function getBackgroundColor(): ColorInterface
    {
        $colorArray = $this->input('background_color');
        return  new Color($colorArray['r'], $colorArray['g'], $colorArray['b'], $colorArray['a']);
    }

    public function getQRContent(): string
    {
        return $this->input('content');
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        $fillMsg = 'Fill message is required';
        $bgMsg = 'Background color is incorrect';
        return [
            'background_color.*' => $bgMsg,
            'fill_color.*' => $fillMsg,
            'background_color.a.*' => $bgMsg,
            'fill_color.a.*' => $fillMsg,
            'background_color.r.*' => $bgMsg,
            'fill_color.r.*' => $fillMsg,
            'background_color.g.*' => $bgMsg,
            'fill_color.g.*' => $fillMsg,
            'background_color.b.*' => $bgMsg,
            'fill_color.b.*' => $fillMsg,
        ];
    }
}
