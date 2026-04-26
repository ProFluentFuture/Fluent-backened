<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailTemplate extends Model
{
    protected $fillable = ['slug', 'subject', 'body', 'description'];

    /**
     * Parse template body with provided data
     */
    public function parse($data)
    {
        $parsedBody = $this->body;
        $parsedSubject = $this->subject;

        foreach ($data as $key => $value) {
            $placeholder = "{" . $key . "}";
            $parsedBody = str_replace($placeholder, $value, $parsedBody);
            $parsedSubject = str_replace($placeholder, $value, $parsedSubject);
        }

        return [
            'subject' => $parsedSubject,
            'body' => $parsedBody
        ];
    }
}
