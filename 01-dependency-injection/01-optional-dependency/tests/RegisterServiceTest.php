<?php

namespace Tests;

use App\CodeGenerator;
use App\RegisterService;
use PHPUnit\Framework\TestCase;

class RegisterServiceTest extends TestCase
{

    public function testGetRegisterUrl_external_base_url()
    {
        // GIVEN
        $generateResult = 'randomString';
        $registerService = $this->getRegisterServiceInstance($generateResult);
        $baseUrl = 'baseUrl';
        $registerService->setBaseUrl($baseUrl);

        // WHEN
        $result = $registerService->getRegisterUrl();

        // THEN
        $this->assertEquals($baseUrl . $generateResult, $result);
    }

    public function testGetRegisterUrl_default_base_url()
    {
        // GIVEN
        $generateResult = 'randomString';
        $registerService = $this->getRegisterServiceInstance($generateResult);

        // WHEN
        $result = $registerService->getRegisterUrl();

        // THEN
        $this->assertEquals(RegisterService::DEFAULT_BASE_URL . $generateResult, $result);
    }

    private function getRegisterServiceInstance($generateResult): RegisterService {
        $codeGeneratorMock = $this->createMock(CodeGenerator::class);
        $codeGeneratorMock->method('generate')->willReturn($generateResult);
        $codeGeneratorMock
            ->expects($this->once())
            ->method('generate')
            ->with(12);

        return new RegisterService($codeGeneratorMock);
    }
}
