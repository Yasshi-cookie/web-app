<?php

namespace App\Math;

use Exception;
// use App\Math\Math;

class SymmetricGroupMath
{
    /**
     * 次元
     *
     * @var integer
     */
    private int $dimension;

    /**
     * 置換を構成する写像
     *
     * @var array
     */
    private array $map;

    /**
     * LaTeX表示用URL
     */
    private const DISPLAY_BASE_URL = "https://render.githubusercontent.com/render/math?math=";

    public const URL_ENCODE_SPACE = "%20";
    public const URL_ENCODE_AND = "%26";


    /**
     * constructor
     */
    public function __construct(int $dimension, array $map)
    {
        $this->setDimension($dimension);
        $this->setMap($map);
    }

    /**
     * Getter
     */

    /**
     * get Dimension
     *
     * @return integer
     */
    public function getDimension(): int
    {
        return $this->dimension;
    }

    /**
     * get Map
     *
     * @return array
     */
    public function getMap(): array
    {
        return $this->map;
    }

    /**
     * Setter
     */

    /**
     * set Dimension
     * 他クラスから次元を変える操作は許可しない
     *
     * @param int $dimension
     */
    private function setDimension(int $dimension)
    {
        $this->dimension = $dimension;
    }

    /**
     * set Map
     *
     * @param array $map
     */
    public function setMap(array $map)
    {
        if (count(array_unique($map)) !== $this->dimension) {
            throw new Exception('置換のサイズが不適か、または重複した値が入っています。');
        }
        foreach ($map as $value) {
            if (!(is_int($value) && $value >= 1 && $value <= $this->dimension)) {
                throw new Exception('置換の文字は数字で、かつ1からdimensionの間である必要があります。');
            }
        }
        $this->map = $this->key_inc($map);
    }

    /**
     * $perm_a * $perm_bを返す
     *
     * @param self $perm_a
     * @param self $perm_b
     * @return self
     */
    public static function product(self $perm_a, self $perm_b): self
    {
        if ($perm_a->dimension !== $perm_b->dimension) {
            throw new Exception('置換同士の積は、互いに同じ次元である必要があります。');
        }
        $map_a = $perm_a->map;
        $map_b = $perm_b->map;

        $producted_map = array_map(
            function($value) use($map_b) {
                return $map_b[$value];
            },
            $map_a
        );
        return new self($perm_a->dimension, $producted_map);
    }

    /**
     * $permの逆元を返す
     *
     * @param self $perm
     * @return self
     */
    public function inverse(): self
    {
        $tmp_array =
        $invers_map = [];
        foreach ($this->map as $key => $value) {
            $tmp_array[$value] = $key;
        }
        for ($i = 1; $i <= count($this->map); $i++) {
            $invers_map[$i] = $tmp_array[$i];
        }
        return new self($this->dimension, $invers_map);
    }

    /**
     * LaTeX表示用のURLを生成
     *
     * @return string
     */
    public function display(): string
    {
        return self::DISPLAY_BASE_URL . $this->urlParamBuilderForDisplay();
    }

    /**
     * private
     */

    /**
     * 配列のキーを1から振り直す
     *
     * @param array $map
     */
    private function key_inc(array $map)
    {
        $tmp_array = [];
        $count = 1;
        foreach ($map as $value) {
            $tmp_array[$count] = $value;
            $count++;
        }
        return $tmp_array;
    }

    /**
     * LaTeX表示用のURLパラメータを生成
     *
     * @return string
     */
    private function urlParamBuilderForDisplay(): string
    {
        $get_param = "\displaystyle" . self::URL_ENCODE_SPACE . "\bigl(\begin{smallmatrix}";
        $get_param .= self::URL_ENCODE_SPACE . 1 . self::URL_ENCODE_SPACE . self::URL_ENCODE_AND . self::URL_ENCODE_SPACE . 2 . self::URL_ENCODE_SPACE . self::URL_ENCODE_AND . self::URL_ENCODE_SPACE . 3 . self::URL_ENCODE_SPACE . self::URL_ENCODE_AND . self::URL_ENCODE_SPACE . 4;
        $get_param .= self::URL_ENCODE_SPACE . "\\\\";
        foreach ($this->map as $key => $value) {
            if ($key === array_key_last($this->map)) {
                $get_param .= self::URL_ENCODE_SPACE . $value . self::URL_ENCODE_SPACE;
                break;
            }
            $get_param .= self::URL_ENCODE_SPACE . $value . self::URL_ENCODE_SPACE . self::URL_ENCODE_AND;
        }
        $get_param .= '\end{smallmatrix}\bigr)';

        return $get_param;
    }
}
