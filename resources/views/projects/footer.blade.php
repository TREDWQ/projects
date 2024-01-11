<div class="card-footer border-0 bg-transparent">
    <div class="d-flex text-sm">
        <div class="d-flex align-items-center">
            <img src="/images/clock.svg" alt="">
            <div class="me-2">
                {{ $project->created_at->diffForHumans() }}
            </div>
        </div>
        <div class="d-flex align-items-center me-3">
            <img src="/images/list-check.svg" alt="">
            <div class="me-2">
                {{ $project->tasks->count() }}
            </div>
        </div>
        <div class="d-flex align-items-center me-auto">
            <form method="POST" action="/projects/{{ $project->id }}" class="hide-submit">
                @csrf
                @method("DELETE")
                <button type="submit" class="btn btn-danger mt-2">حذف</button>
            </form>
        </div>
    </div>
</div>

