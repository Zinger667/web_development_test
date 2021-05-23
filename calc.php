<?php
If (($_POST["dateOfContribution"]) != null
    and ($_POST["sumOfContribution"]) != null
    and ($_POST["timeOfContribution"]) != null
    and ($_POST["selectedOptionReplenishment"]) != null
    and ($_POST["sumOfReplenishment"]) != null) {

        function numOfDaysInYear($year) {                                               //Вычисление кол-ва дней в году
            if(( $year % 4 == 0 ) or (( $year % 100 == 0 ) and ( $year % 400 == 0 ))){

                return 366;
            }
            else{

                return 365;
            }
        }

        function numOfDaysInMonth($month, $year) {                                      //Вычисление кол-ва дней в месяце.

            return cal_days_in_month(CAL_GREGORIAN, $month, $year);
        }

        function capitalization($summn, $summadd, $daysn, $daysy, $percent) {           //Вычисление суммы на начало следующего месяца без пополнения вклада.
            $result = $summn + $summadd + ($summn + $summadd) * $daysn * ( $percent / $daysy );

            return $result;
        }

        function capitalizationWithoutReplenishment($summn, $daysn, $daysy, $percent) { //Вычисление суммы на начало следующего месяца с пополнением вклада.
            $result = $summn + $summn * $daysn * ( $percent / $daysy );

            return $result;
        }

        function Transition($month, $year) {                                            //Пересчет количества дней в месяце и году.
            if( $month == 12 ) {
                $month = 0;
                $year += 1;
            }
            $month += 1;
            $numOfDaysInYear = numOfDaysInYear( $year );
            $numOfDaysInMonth = numOfDaysInMonth( $month, $year );

            return array($numOfDaysInYear, $numOfDaysInMonth, $month, $year);
        }


        $date = $_POST["dateOfContribution"];
        $sumOfContribution = $_POST["sumOfContribution"];
        $time = $_POST["timeOfContribution"];
        $optionofReplenishment = $_POST["selectedOptionReplenishment"];
        $sumOfReplenishment = $_POST["sumOfReplenishment"];
        $percent = 0.1;
        $monthCount = $time * 12;
        $yearOfContribution = (int)substr( $date, (strripos($date, ".") ) + 1);
        $monthOfContribution = (int)substr( $date, (strpos($date, ".") ) + 1, 2);

        if( $optionofReplenishment == "no" ) {
            for ($i = 0; $i < $monthCount; $i++) {
                [$numOfDaysInYear, $numOfDaysInMonth, $monthOfContribution, $yearOfContribution] = Transition($monthOfContribution, $yearOfContribution);
                $sumOfContribution = capitalizationWithoutReplenishment( $sumOfContribution, $numOfDaysInMonth, $numOfDaysInYear, $percent );
            } 
        }
        else{
            for ($i = 0; $i < $monthCount; $i++) {
                [$numOfDaysInYear, $numOfDaysInMonth, $monthOfContribution, $yearOfContribution] = Transition($monthOfContribution, $yearOfContribution);
                $sumOfContribution = capitalization( $sumOfContribution, $sumOfReplenishment, $numOfDaysInMonth, $numOfDaysInYear, $percent );
            } 
        }
        echo (int)$sumOfContribution,' руб.';
} Else {
    echo ("Заполните все поля.");
}
?>