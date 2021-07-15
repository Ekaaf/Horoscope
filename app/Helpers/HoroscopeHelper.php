<?php

    function getZodiacSigns($zodiac_id = ""){
        $signs =[
            '1'=>'Aries',
            '2'=>'Taurus',
            '3'=>'Gemini',
            '4'=>'Cancer',
            '5'=>'Leo',
            '6'=>'Virgo',
            '7'=>'Libra',
            '8'=>'Scorpio',
            '9'=>'Sagittarius',
            '10'=>'Capricorn',
            '11'=>'Aquarius',
            '12'=>'Pisces'
        ];
        if($zodiac_id == ""){
            return $signs;
        }
        else{
            return $signs[$zodiac_id];
        }
      
   }

   function colorCodebyScore($score = ""){
        $colorCodes =[
            '1'=>'#ff0000',
            '2'=>'#ff5500',
            '3'=>'#ff8000',
            '4'=>'#ffaa00',
            '5'=>'#ffd500',
            '6'=>'#ffff00',
            '7'=>'#d5ff00',
            '8'=>'#aaff00',
            '9'=>'#80ff00',
            '10'=>'#00ff00'
        ];

        if($score == ""){
            return $colorCodes;
        }
        else{
            return $colorCodes[$score];
        }
   }

   function getMessagebyScore($score = ""){
        $messages =[
            '1'=>'Worst day',
            '2'=>'Worse day',
            '3'=>'Very bad day',
            '4'=>'Bad day',
            '5'=>'Not that much of a bad day',
            '6'=>'Not that much of a good day',
            '7'=>'Good day',
            '8'=>'Very good day',
            '9'=>'Better day',
            '10'=>'Best day'
        ];

        if($score == ""){
            return $messages;
        }
        else{
            // dd($messages[$score]);
            return $messages[$score];
        }
   }