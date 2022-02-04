<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ExcelRule implements Rule
{
	private $file;

	public function __construct($file)
	{
		$this->file = $file;
	}

	public function passes($attribute, $value)
	{
		$extension = strtolower($this->file->getClientOriginalExtension());

		return in_array($extension, ['csv', 'xls', 'xlsx']);
	}

	public function message()
	{
		return 'The excel file must be a file of type: csv, xls, xlsx.';
	}
}
