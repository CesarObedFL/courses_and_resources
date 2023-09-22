<?php

class MyDate
{
    protected $DAYS = array();
    protected $MONTHS = array();

    public function __construct()
    {
        $this->DAYS = array("Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado", "Domingo");
        $this->MONTHS = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
    }

    // transform the integer month to a string month
    public function integer_month_to_string_month($date)
    {
        $month = substr($date, 5, 2);

        if ($month > 0 && $month <= 12) {
            return $this->MONTHS[ $month - 1 ];
        }

        return "Error en el formato de la fecha";
    }


    // get the day of the week between two dates
    public function week_day($date)
    {
        $day = date("d", strtotime($date));
        $number_day = date('N', strtotime($date));

        if ($number_day > 0 && $number_day <= 7) {
            return $this->DAYS[ $number_day - 1 ] . ' ' . $day;
        }

        return "Error en el formato de fecha...";
    }

    public function print_date($date)
    {
        return $this->week_day($date) . " de " . $this->integer_month_to_string_month($date) . ' de ' . substr($date, 0, 4);
    }

}



// testing
$my_date = new MyDate();
$date =  '1991-12-09';
$date1 = "2018-12-29";
$date2 = "2019-01-12";

echo $my_date->print_date($date) . '<br>';

for( $i = $date1; $i <= $date2; $i = date("Y-m-d", strtotime($i ."+ 1 days")) )
{
    echo $my_date->print_date($i) . '<br>';
}