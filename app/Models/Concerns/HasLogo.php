<?php

namespace App\Models\Concerns;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait HasLogo
{
    protected function logoDisk(): string
    {
        return 'public';
    }

    protected function logoColumn(): string
    {
        return 'logo';
    }

    protected function logoDirectory(): string
    {
        return Str::plural(Str::snake(class_basename($this)));
    }

    public function storeLogo(UploadedFile $file): string
    {
        $this->removeLogo();

        $path = $file->store(
            $this->logoDirectory(),
            $this->logoDisk()
        );

        $this->{$this->logoColumn()} = sprintf('/%s', $path);
        $this->save();

        return $path;
    }

    public function removeLogo(): void
    {
        $column = $this->logoColumn();
        $path = $this->{$column};

        if ($path) {
            Storage::disk($this->logoDisk())->delete($path);
        }

        $this->{$column} = null;
        $this->save();
    }
}