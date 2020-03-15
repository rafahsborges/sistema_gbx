<?php

/*
 * Juno é uma solução para emissão de cobranças da Juno
 * Para usar, é necessário ter um cadastro no Juno e gerar um token de integração.
 * Acesse e confira: https://juno.com.br/
 * Documentação: https://dev.juno.com.br/api/v2
 * Criado por: Rafael Souza Borges (rafaelsouzaborges@outlook.com/rafael.borges@basis.com.br) *
 */

namespace App\Juno;

use Carbon\Carbon;

/**
 * Class Juno
 * @package App\Juno
 */
class Juno
{
    private $resource_token;
    private $authorization_token;
    private $sandbox;
    private $credentials;

    const TOKEN_PROD_URL = "https://api.juno.com.br/authorization-server";
    const TOKEN_SANDBOX_URL = "https://sandbox.boletobancario.com/authorization-server/oauth/token";
    const PROD_URL = "https://api.juno.com.br";
    const SANDBOX_URL = "https://sandbox.boletobancario.com/api-integration";
    const RESPONSE_TYPE = "JSON";

    function __construct($resource_token, $sandbox = false)
    {
        $this->resource_token = $resource_token;
        $this->sandbox = $sandbox;
        $this->credentials = base64_encode("" . env('JUNO_CLIENT_ID') . ":" . env('JUNO_CLIENT_SECRET') . "");
        $this->authorization_token = $this->getToken();
    }

    private function getToken()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->sandbox ? Juno::TOKEN_SANDBOX_URL : Juno::TOKEN_PROD_URL);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'grant_type=client_credentials');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $headers = [
            'Content-Type: application/x-www-form-urlencoded',
            'Authorization: Basic ' . $this->credentials,
        ];

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }

        curl_close($ch);

        $response = json_decode($response, true);

        return $response['access_token'];
    }

    public function listCharges()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, ($this->sandbox ? Juno::SANDBOX_URL : Juno::PROD_URL) . '/charges');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $headers = [
            'Authorization: Bearer ' . $this->authorization_token,
            'X-API-Version: 2',
            'X-Resource-Token: ' . $this->resource_token,
        ];

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }

        curl_close($ch);

        $response = json_decode($response, true);

        return $response;
    }

    public function getCharge($id)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, ($this->sandbox ? Juno::SANDBOX_URL : Juno::PROD_URL) . '/charges/' . $id);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $headers = [
            'Authorization: Bearer ' . $this->authorization_token,
            'X-API-Version: 2',
            'X-Resource-Token: ' . $this->resource_token,
        ];

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }

        curl_close($ch);

        $response = json_decode($response, true);

        return $response;
    }

    public function createCharge($boleto)
    {
        $references = [];

        for ($i = 1; $i <= $boleto->parcelas; $i++) {
            array_push($references, "Boleto " . $i);
        }

        $fields = '';

        if ($boleto->parcelas > 1) {
            $fields = [
                "charge" => [
                    "description" => $boleto->descricao,
                    "references" => $references,
                    "amount" => round($boleto->valor / $boleto->parcelas, 2),
                    "dueDate" => Carbon::createFromFormat('Y-m-d H:i:s', $boleto->vencimento)->format('Y-m-d'),
                    "installments" => $boleto->parcelas,
                    "maxOverdueDays" => $boleto->dias_vencimento,
                    "fine" => $boleto->juros,
                    "interest" => $boleto->multa,
                    "discountAmount" => $boleto->desconto,
                    "discountDays" => $boleto->dias_desconto,
                    "paymentTypes" => [
                        "BOLETO",
                    ],
                ],
                "billing" => [
                    "name" => $boleto->cliente->tipo == 0 ? $boleto->cliente->nome : $boleto->cliente->razao_social,
                    "document" => $boleto->cliente->tipo == 0 ? preg_replace('/\D/', '', $boleto->cliente->cpf) : preg_replace('/\D/', '', $boleto->cliente->cnpj),
                    "email" => $boleto->cliente->email,
                    "secondaryEmail" => $boleto->cliente->email2,
                    "phone" => $boleto->cliente->telefone,
                    "notify" => $boleto->notificar,
                ]
            ];
        } else {
            $fields = [
                "charge" => [
                    "description" => $boleto->descricao,
                    "references" => $references,
                    "amount" => $boleto->valor,
                    "dueDate" => Carbon::createFromFormat('Y-m-d H:i:s', $boleto->vencimento)->format('Y-m-d'),
                    "maxOverdueDays" => $boleto->dias_vencimento,
                    "fine" => $boleto->juros,
                    "interest" => $boleto->multa,
                    "discountAmount" => $boleto->desconto,
                    "discountDays" => $boleto->dias_desconto,
                    "paymentTypes" => [
                        "BOLETO",
                    ],
                ],
                "billing" => [
                    "name" => $boleto->cliente->tipo == 0 ? $boleto->cliente->nome : $boleto->cliente->razao_social,
                    "document" => $boleto->cliente->tipo == 0 ? preg_replace('/\D/', '', $boleto->cliente->cpf) : preg_replace('/\D/', '', $boleto->cliente->cnpj),
                    "email" => $boleto->cliente->email,
                    "secondaryEmail" => $boleto->cliente->email2,
                    "phone" => $boleto->cliente->telefone,
                    "notify" => $boleto->notificar,
                ]
            ];
        }

        $data = json_encode($fields);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, ($this->sandbox ? Juno::SANDBOX_URL : Juno::PROD_URL) . '/charges');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        $headers = [
            'Content-type: application/json',
            'Authorization: Bearer ' . $this->authorization_token,
            'X-API-Version: 2',
            'X-Resource-Token: ' . $this->resource_token,
        ];

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }

        curl_close($ch);

        $response = json_decode($response, true);

        return $response;
    }

    public function cancelCharge($id)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, ($this->sandbox ? Juno::SANDBOX_URL : Juno::PROD_URL) . '/charges/' . $id . '/cancelation');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $headers = [
            'Authorization: Bearer ' . $this->authorization_token,
            'X-API-Version: 2',
            'X-Resource-Token: ' . $this->resource_token,
        ];

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }

        curl_close($ch);
    }
}
