<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Myrule;

class HelloRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    if ($this->path() == 'hello') {
      return true;
    } else {
      return false;
    }
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
   */
  public function rules(): array
  {
    return [
      'name' => 'required',
      'mail' => 'email',
      'age' => 'numeric|hello'
      // 'age' => ['numeric', new Myrule(5)],
    ];
  }

  // オリジナルメッセージの作成
  public function messages()
  {
    return [
      'name.required' => '名前は必ず入力して下さい。',
      'mail.email' => 'メールアドレスが必要です。',
      'age.numeric' => '年齢を整数で記入下さい。',
      'age.between' => '年齢は0 ～ 150の間で入力下さい。',
      'age.hello' => 'Hello! 入力は偶数のみ受け付けます。',
    ];
  }
}
