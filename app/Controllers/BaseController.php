<?php

namespace App\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */
use CodeIgniter\Validation\Rules;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\LabelAlignment;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Response\QrCodeResponse;
use CodeIgniter\Controller;

class BaseController extends Controller
{

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = ['form'];
	protected $uri;
	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);
		session();
		$this->uri = service('uri');
		helper('dateindo','url','form');
		$request = \Config\Services::request();
		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
		// $this->session = \Config\Services::session();
	}
	function generateQrCode($kode, $filename, $url) {
		$this->qrcode = new QrCode($url);
		$this->qrcode->setSize(500);
		$this->qrcode->setWriterByName('png');
		$this->qrcode->setEncoding('UTF-8');
		$this->qrcode->setErrorCorrectionLevel(ErrorCorrectionLevel::HIGH());
		$this->qrcode->setForegroundColor(['r' => 0, 'g' => 0, 'b' => 0, 'a' => 0]);
		$this->qrcode->setBackgroundColor(['r' => 255, 'g' => 255, 'b' => 255, 'a' => 0]);
		$this->qrcode->setLogoPath(ROOTPATH . 'assets/img/logo_kab.png');
		$this->qrcode->setLabel($kode, 30);
		$this->qrcode->setLogoSize(150, 150);
		$this->qrcode->setValidateResult(true);
		$this->qrcode->setRoundBlockSize(true, QrCode::ROUND_BLOCK_SIZE_MODE_MARGIN);
		$this->qrcode->setRoundBlockSize(true, QrCode::ROUND_BLOCK_SIZE_MODE_ENLARGE);
		$this->qrcode->setRoundBlockSize(true, QrCode::ROUND_BLOCK_SIZE_MODE_SHRINK);
		$this->qrcode->setWriterOptions(['exclude_xml_declaration' => true]);
		header('Content-Type: ' . $this->qrcode->getContentType());
		$this->qrcode->writeFile($filename);
		$image = imagecreatefromstring(file_get_contents($filename));
		is_resource($image);
		return imagedestroy($image);
		}
}
