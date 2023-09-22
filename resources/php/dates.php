<?php

class MyDate
{
    protected $DAYS = array();
    protected $MONTHS = array();
    private $date;

    public function __construct($date)
    {
        $this->DAYS = array("Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado", "Domingo");
        $this->MONTHS = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        $this->date = $date;
    }

    // transform the integer month to a string month
    public function integer_month_to_string_month()
    {
        $month = substr($this->date, 5, 2);

        if ($month > 0 && $month <= 12) {
            return $this->MONTHS[ $month - 1 ];
        }

        return "Error en el formato de la fecha";
    }


    // get the day of the week between two dates
    public function week_day()
    {
        $day = date("d", strtotime($this->date));
        $number_day = date('N', strtotime($this->date));

        if ($number_day > 0 && $number_day <= 7) {
            return $this->DAYS[ $number_day - 1 ] . ' ' . $day;
        }

        return "Error en el formato de fecha...";
    }

    function __toString()
    {
        return $this->week_day() . " de " . $this->integer_month_to_string_month() . ' de ' . substr($this->date, 0, 4);
    }

}



// testing
$date1 = "2018-12-29";
$date2 = "2019-01-12";

echo (new MyDate('1991-12-09')) . '<br>';

for( $i = $date1; $i <= $date2; $i = date("Y-m-d", strtotime($i ."+ 1 days")) )
{
    echo (new MyDate($i)) . '<br>';
}