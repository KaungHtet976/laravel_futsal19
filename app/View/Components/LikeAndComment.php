<?php

namespace App\View\Components;

use App\Models\Blog;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LikeAndComment extends Component
{
    /**
     * Create a new component instance.
     */

    public $blog;
    public $isLiked;
    public function __construct(Blog $blog, $isLiked)
    {
        $this->blog = $blog;
        $this->isLiked = $isLiked;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.like-and-comment');
    }
}
