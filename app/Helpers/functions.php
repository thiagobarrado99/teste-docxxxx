<?php

use Illuminate\Http\Request;
use \Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

if (!function_exists("long_date")) {
    /**
     * Converts a DateTime to a string in long format
     *
     * @param string $value
     * @param string $default
     * @return string
     */
    function long_date(\DateTime $date): string
    {
        $days = [
            "0" => "Domingo",
            "1" => "Segunda-feira",
            "2" => "Terça-feira",
            "3" => "Quarta-feira",
            "4" => "Quinta-feira",
            "5" => "Sexta-feira",
            "6" => "Sábado"
        ];
        $months = [
            "1" => "Janeiro",
            "2" => "Fevereiro",
            "3" => "Março",
            "4" => "Abril",
            "5" => "Maio",
            "6" => "Junho",
            "7" => "Julho",
            "8" => "Agosto",
            "9" => "Setembro",
            "10" => "Outubro",
            "11" => "Novembro",
            "12" => "Dezembro"
        ];

        return $days[$date->format("w")] . ", " . $date->format("d") . " de " . $months[$date->format("n")] . " de " . $date->format("Y");
    }
}

if (!function_exists("money_format")) {
    /**
     * format a number as currency
     *
     * @param float $value
     * @return string
     */
    function money_format($value)
    {
        if($value)
        {
            return "R$ " . number_format($value, 2, ",", ".");
        }
        return "R$ 0";
    }
}

if (!function_exists("phone_format")) {
    /**
     * format a string as phone
     *
     * @param string $value
     * @return string
     */
    function phone_format($value): string
    {
        switch (strlen($value)) {
            case 8:
                return substr($value, 0, 4) . "-" . substr($value, 4);
                break;
            case 9:
                return substr($value, 0, 5) . "-" . substr($value, 5);
                break;
            case 10:
                return "(".substr($value, 0, 2) . ") " . substr($value, 2, 4) . "-" . substr($value, 6);
                break;
            case 11:
                return "(".substr($value, 0, 2) . ") " . substr($value, 2, 5) . "-" . substr($value, 7);
                break;
        }
        return (empty($value) ? "" : $value);
    }
}

if (!function_exists("cpf_format")) {
    /**
     * format a string as cpf or cnpj
     *
     * @param string $value
     * @return string
     */
    function cpf_format(float $value): string
    {
        if (strlen($value) >= 12) {
            return substr($value, 0, 2) . "." . substr($value, 2, 3) . "." . substr($value, 5, 3) . "/" . substr($value, 8, 4) . "-" . substr($value, 12);
        }
        return substr($value, 0, 3) . "." . substr($value, 3, 3) . "." . substr($value, 6, 3) . "-" . substr($value, 8);
    }
}

if (!function_exists("cep_format")) {
    /**
     * format a string as cep
     *
     * @param string $value
     * @return string
     */
    function cep_format(float $value): string
    {
        return substr($value, 0, 2) . "." . substr($value, 2, 3) . "-" . substr($value, 5);
    }
}
if (!function_exists("mailto")) {
    /**
     * created a mailto link
     *
     * @param string $email
     * @return string
     */
    function mailto(string $email): string
    {
        return "mailto:" . $email;
    }
}

if (!function_exists("whatsapp")) {
    /**
     * creates a whatsapp link
     *
     * @param string $number
     * @return string
     */
    function whatsapp(string $number): string
    {
        return "https://wa.me/55" . $number;
    }
}

if (!function_exists("item_counts")) {
    /**
     * retrieves total items count
     *
     * @param float $value
     * @return string
     */
    function item_counts(): array
    {
        //If we have multiple tables to count, use UNION ALL
        return collect(DB::select("SELECT 'zips' AS table_name, COUNT(*) AS total_records FROM zips"))->pluck('total_records', 'table_name')->toArray();
    }
}

if (!function_exists("money_unformat")) {
    /**
     * unformat a money-formatted string
     *
     * @param string $value
     * @return string
     */
    function money_unformat($value)
    {
        if($value && stripos($value, ",") !== FALSE)
        {
            $value = preg_replace("/[^\d\.\,]/", "", $value);
            $value = str_replace(".", "", $value);
            $value = str_replace(",", ".", $value);    
        }
        return $value;
    }
}

if (!function_exists("date_create_from_formats")) {
    /**
     * unformat a money-formatted string
     *
     * @param string $value
     * @return string
     */
    function date_create_from_formats($date, $formats = ["Y-m-d H:i", "Y-m-d\TH:i", "Y-m-d H:i:s", "Y-m-d\TH:i:s.u\Z"])
    {
        if(!empty($date))
        {
            foreach($formats as $format){
                if($date_parsed = date_create_from_format($format, $date))
                {
                    return $date_parsed;
                }
            }
        }
        return false;
    }
}

if (!function_exists("random_string")) {
    /**
     * creates a random string
     *
     * @param int $length
     * @return string
     */
    function random_string(int $length): string
    {
        return substr(
            str_shuffle(
                str_repeat(
                    MD5(
                        microtime()
                    ),
                    ceil($length / 32)
                )
            ),
            0,
            $length
        );
    }
}

if (!function_exists("querySearch")) {
    /**
     * Search a ORM model by params
     * $search_arguments should be an array with the column search definitions, following below format:
     * <request field name, defined in the frontend form> => [ 
     *     0 => DB Column, 
     *     1 => Operator (=, <=, >=, !...), 
     *     2 => Custom function to filter the value before searching the DB (like remove masks), 
     *     3 => default value for field
     * ]
     *
     * @param Builder &$query
     * @param array $search_arguments
     * @param Request $request
     */
    function querySearch(Builder &$query, array $search_arguments, Request $request)
    {
        foreach ($search_arguments as $key => $value) {
            //Actual filters
            if (!empty($request->get($key))) {
                $query->where($value[0], $value[1], (isset($value[2]) && is_callable($value[2]) ? call_user_func($value[2], $request->get($key)) : $request->get($key)));
            } else if (!empty($value[3])) {
                $query->where($value[0], $value[1], $value[3]);
            }
        }
    }
}