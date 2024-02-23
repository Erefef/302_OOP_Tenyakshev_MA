<?php
class Vector {
    private $x;
    private $y;
    private $z;

    public function __construct($x, $y, $z) {
        // Проверка на допустимость значений
        if (!is_numeric($x) || !is_numeric($y) || !is_numeric($z)) {
            throw new Exception('Некорректные значения координат');
        }
        $this->x = $x;
        $this->y = $y;
        $this->z = $z;
    }

    public function add(Vector $vector) {
        $x = $this->x + $vector->x;
        $y = $this->y + $vector->y;
        $z = $this->z + $vector->z;
        return new Vector($x, $y, $z);
    }

    public function sub(Vector $vector) {
        $x = $this->x - $vector->x;
        $y = $this->y - $vector->y;
        $z = $this->z - $vector->z;
        return new Vector($x, $y, $z);
    }

    public function product($number) {
        $x = $this->x * $number;
        $y = $this->y * $number;
        $z = $this->z * $number;
        return new Vector($x, $y, $z);
    }

    public function scalarProduct(Vector $vector) {
        return ($this->x * $vector->x) + ($this->y * $vector->y) + ($this->z * $vector->z);
    }

    public function vectorProduct(Vector $vector) {
        $x = ($this->y * $vector->z) - ($this->z * $vector->y);
        $y = ($this->z * $vector->x) - ($this->x * $vector->z);
        $z = ($this->x * $vector->y) - ($this->y * $vector->x);
        return new Vector($x, $y, $z);
    }

    public function __toString() {
        return "(" . $this->x . "; " . $this->y . "; " .  $this->z . ")";
    }
}
?>