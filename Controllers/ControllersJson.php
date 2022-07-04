<?php
    class ControllersJson {
        /**
         * Основной рабочий метод
         *
         * @return string
         */
        public function run() {
            echo "<h1>JSON-формат</h1>>";

            $arr = [
                'fio' => 'Шевцов Валерий',
                'age' => '20',
                'job' => 'no',
                'slash' => '//'
            ];

            $arr2 = json_encode($arr, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
            echo '<pre>';
            echo print_r($arr2);
            echo '</pre>';

            $json = '{
                "fio" : "Соловьев Никита",
                "number" : "9549321234",
                "job" : "no"
            }';

            $arr3 = json_decode($json, true);
            echo '<pre>';
            echo print_r($arr3);
            echo '</pre>';
            return $arr3;
        }


    }