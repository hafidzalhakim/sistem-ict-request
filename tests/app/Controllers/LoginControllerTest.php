<?php

namespace Tests\App\Controllers;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestCase;
use CodeIgniter\Test\FeatureTestTrait;
use App\Models\LoginModel;

class LoginControllerTest extends CIUnitTestCase
{
    use FeatureTestTrait;

    public function setUp(): void
    {
        parent::setUp();

        // Mock Validation agar selalu lolos
        $mockValidation = $this->createMock(\CodeIgniter\Validation\Validation::class);
        $mockValidation->method('withRequest')->willReturnSelf();
        $mockValidation->method('run')->willReturn(true);

        \Config\Services::injectMock('validation', $mockValidation);
    }

    public function testLoginValidationFailed()
    {
        // Inject Validation yang gagal (khusus test ini)
        $mockValidation = $this->createMock(\CodeIgniter\Validation\Validation::class);
        $mockValidation->method('withRequest')->willReturnSelf();
        $mockValidation->method('run')->willReturn(false);

        \Config\Services::injectMock('validation', $mockValidation);

        $response = $this->post('/auth', []);

        $response->assertRedirectTo('/login');
        $response->assertSessionHas('error', 'failed');
    }

    // public function testLoginSuccessAsManager()
    // {
    //     $mockUser = (object)[
    //         'id_pengguna' => 1,
    //         'username' => 'manager1',
    //         'password' => password_hash('123456', PASSWORD_DEFAULT), // Use proper password hash
    //         'nama_pengguna' => 'Manager One',
    //         'divisi' => 'ICT',
    //         'role' => 'manager'
    //     ];

    //     // Mock the LoginModel
    //     $mockModel = $this->createMock(LoginModel::class);
    //     $mockModel->method('validateUser')->willReturn($mockUser);
    //     \CodeIgniter\Config\Factories::injectMock('models', 'App\Models\LoginModel', $mockModel);

    //     // Mock validation service
    //     $mockValidation = $this->createMock(\CodeIgniter\Validation\ValidationInterface::class);
    //     $mockValidation->method('withRequest')->willReturnSelf();
    //     $mockValidation->method('run')->willReturn(true);
    //     $mockValidation->method('getErrors')->willReturn([]);
    //     \Config\Services::injectMock('validation', $mockValidation);

    //     // Send POST request
    //     $response = $this->post('/auth', [
    //         'username' => 'manager1',
    //         'password' => '123456'
    //     ]);

    //     // Debug: Check what the actual redirect location is
    //     $actualLocation = $response->getRedirectUrl();
    //     echo "Actual redirect URL: " . $actualLocation . "\n";

    //     // Use the correct assertion method with base_url()
    //     $response->assertRedirectTo(base_url('manager'));
        
    //     // Check session data
    //     $this->assertEquals('manager', session()->get('role'));
    //     $this->assertTrue(session()->get('isLogin'));
    //     $this->assertEquals(1, session()->get('id'));
    //     $this->assertEquals('Manager One', session()->get('nama_pengguna'));
    //     $this->assertEquals('ICT', session()->get('divisi'));
    // }


    public function testLoginInvalidCredentials()
    {
        $mockModel = $this->createMock(LoginModel::class);
        $mockModel->method('validateUser')->willReturn(null);

        \CodeIgniter\Config\Factories::injectMock('models', 'App\Models\LoginModel', $mockModel);

        $response = $this->post('/auth', [
            'username' => 'salah',
            'password' => 'salah'
        ]);

        $response->assertRedirectTo('/login');
        $response->assertSessionHas('error', 'invalid');
    }
}