<?php

namespace App\Helper;
use cebe\markdown\Markdown;

class MarkdownHelper {
protected  $parser;

    public function __construct(Markdown $parser)
    {

        $this->parser=$parser;

    }

    public function parse(array  $posts):array {
        $parsedPost=[];
        foreach ($posts as $post){
            $parsedPost[]=['title'=>$post->getTitle(),
                'content'=>$this->parser->parse($post->getContent())
            ];
        }

        return  $parsedPost;
    }
}