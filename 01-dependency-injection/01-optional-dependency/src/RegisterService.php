<?php

namespace App;

class RegisterService
{
    private CodeGenerator $codeGenerator;
    private const CODE_LENGTH = 12;
    public const DEFAULT_BASE_URL = 'http://localhost/register/';

    private string $baseUrl;
    public function __construct(CodeGenerator $codeGenerator)
    {
        $this->codeGenerator = $codeGenerator;
    }

    /**
     * @param string $baseUrl
     */
    public function setBaseUrl(string $baseUrl): void
    {
        $this->baseUrl = $baseUrl;
    }

    public function getRegisterUrl() : string {
        $url = empty($this->baseUrl) ? RegisterService::DEFAULT_BASE_URL : $this->baseUrl;
        return $url . $this->codeGenerator->generate(RegisterService::CODE_LENGTH);
    }
}