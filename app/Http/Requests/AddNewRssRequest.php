<?php

namespace App\Http\Requests;

use App\Rss;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AddNewRssRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'url' => ['required', 'url']
        ];
    }

    /**
     * Save the RSS.
     *
     * @return RSS
     */
    public function persist()
    {
        $user = Auth::user();

        $rss = new Rss;

        $rss->user_id = $user->id;
        $rss->url = $this->input('url');

        $rss->save();

        return $rss->fresh();
    }
}
