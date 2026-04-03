<?php

use Livewire\Component;
use App\Models\Project;
new class extends Component {
    public Project $project;
    public $media = [];
    public function mount(Project $project)
    {
        $this->project = $project;
        $this->media = $this->project->getMedia('project_files');
    }

    public function deleteMedia($mediaId)
    {
        $media = $this->project->media()->find($mediaId);

        if ($media) {
            $media->delete();
        }

        $this->project->refresh();
    }

    // public function render()
    // {
    //     return view('livewire.project-gallery', [
    //         'media' => $this->project->getMedia('project_files'),
    //     ]);
    // }
};
?>

<div>
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 bg-red-400">

        @foreach ($media as $item)
            <div class="relative group border rounded-lg overflow-hidden">

                {{-- Image --}}
                <img src="{{ $item->getUrl() }}" class="w-full h-40 object-cover" />

                {{-- Overlay --}}
                <div
                    class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition flex items-center justify-center gap-2">

                    {{-- Download --}}
                    <a href="{{ $item->getUrl() }}" target="_blank" class="bg-white text-black px-2 py-1 text-xs rounded">
                        Download
                    </a>

                    {{-- Delete --}}
                    <button wire:click="deleteMedia({{ $item->id }})"
                        class="bg-red-500 text-white px-2 py-1 text-xs rounded">
                        Delete
                    </button>

                </div>

            </div>
        @endforeach

    </div>
</div>
