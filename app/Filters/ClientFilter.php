<?php
namespace App\Filters;
use Illuminate\Http\Request;

class ClientFilter extends ApiFilter{
    protected $safeParams = [
        'name' => ['eq'],
        'typeDoc' => ['eq'],
        'numDoc' => ['eq'],
        'age' => ['eq','lt','lte','gt','gte'],
        'address' => ['eq'],
        'state' => ['eq'],
    ];
    protected $columnMap = [
        'typeDoc' => 'tipo_documento_id',
        'numDoc' => 'numero_documento'
    ];
    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
        'ne' => '!=',
    ];


}
