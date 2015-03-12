<?php namespace CompassHB\Www\Http\Requests;


class FellowshipRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // @todo
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
            'title' => 'required|min:3',
            'day' => 'required|min:6',
            'location' => 'required',
        ];
    }
}
