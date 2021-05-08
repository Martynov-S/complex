<?php
/**
 * Действия с комплексными числами
 */

class ComplexOperations
{
	public static function Sum(Complex $number_1, Complex $number_2)
	{
		$result = new Complex(0);
		$result->set('real', ($number_1->real + $number_2->real));
		$result->set('imaginary', ($number_1->imaginary + $number_2->imaginary));
		return $result;
	}
	
	public static function Diff(Complex $number_1, Complex $number_2)
	{
		$sum_item = new Complex(0);
		$sum_item->set('real', ($number_2->real * (-1)));
		$sum_item->set('imaginary', ($number_2->imaginary * (-1)));
		return self::Sum($number_1, $sum_item);
	}
	
	public static function Multi(Complex $number_1, Complex $number_2)
	{
		$result = new Complex(0);
		$result->set('real', ($number_1->real * $number_2->real + $number_1->imaginary * $number_2->imaginary * (-1)));
		$result->set('imaginary', ($number_1->real * $number_2->imaginary + $number_2->real * $number_1->imaginary));
		return $result;
	}

	public static function Divide(Complex $number_1, Complex $number_2)
	{
		$result = new Complex(0);
		$addition_item = new Complex(0);
		$addition_item->set('real', $number_2->real);
		$addition_item->set('imaginary', $number_2->imaginary * (-1));
		$numerator = self::Multi($number_1, $addition_item);
		$divider_value = ($number_2->real * $number_2->real - $number_2->imaginary * $number_2->imaginary * (-1));
		if ($divider_value == 0) $divider_value = 1;
		$result->set('real', $numerator->real / $divider_value);
		$result->set('imaginary', $numerator->imaginary / $divider_value);
		return $result;
	}
}
?>