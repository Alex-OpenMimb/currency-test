<?php

namespace App\Http\Livewire;

use App\Http\Helpers\HelperCurl;
use Livewire\Component;

class CurrencyController extends Component
{

    public $from_currency, $to_currency, $value, $response, $result;

    public function mount()
    {

    }


    public function render()
    {
        return view('livewire.component',['rsult' => $this->result]);

    }

    public function handleCurrency()
    {
       return $this->calculate();
    }

    public function calculate()
    {

        $this->validate([
            'from_currency'         => 'bail|required|',
            'to_currency'           => 'bail|required|',
            'value'                 => 'bail|required|',
        ]
    );
       
        $response = $this->conectApi($this->from_currency);

        
        $rate = $response['response']->rates;
        
        
        $array = get_object_vars($rate);
        
        
        $taza = $array[$this->to_currency];

        $this->result = $this->value * $taza ;

        // $this->handleReset();
        
    }

    public function conectApi($i)
    {
     
        $base = 'https://api.exchangerate-api.com/v4/latest/';
        $url = $base.$i;
        $header = ['Content-Type : application/json'];
        $curl = HelperCurl::get($url,$header);

        return $curl;
    }
    public function handleReset()
    {
        $this->from_currency = '';
        $this->to_currency   = '';
    }
}
