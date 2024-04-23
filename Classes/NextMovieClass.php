<?php
    declare(strict_types=1);

    class NextMovie {
    
    //Constructor
        public function __construct(
            private int $days_until, 
            private string $title, 
            private string $following_production,
            private int $following_production_days,
            private string $following_production_type,
            private string $release_date, 
            private string $poster_url, 
            private string $overview) {
            
        }

    //Métodos
        function get_until_message (): string {

            $days = $this -> days_until;

            return match(true) {
                $days === 0 => "The release date is TODAY!",
                $days === 1 => "Tomorrow is the release day!",
                $days < 7   => "This week is the release day!",
                $days < 30  => "This month is the release day!",
                default     => "More than a month until release..."
            };
        }

        public function get_data() {
            return get_object_vars($this);
        }

    //Métodos estaticos
        public static function fetch_and_create_movie(string $api_url): NextMovie {
            $result = file_get_contents($api_url);
            $data = json_decode($result, true);
            
            return new self (
                $data["days_until"] ?? "0",
                $data["title"] ?? "Unknown title",
                $data["following_production"]["title"] ?? "Unknown title",
                $data["following_production"]["days_until"] ?? "0",
                $data["following_production"]["type"] ?? "Movie",
                $data["release_date"] ?? "Unknown date",
                $data["poster_url"],
                $data["overview"]
            );
        }

    }

?>