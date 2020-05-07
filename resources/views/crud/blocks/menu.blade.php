@foreach($table_groups as $group)

    <div class="list-group mb-2 bg-light">
        <a href="javascript: return void(0);" class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#menu{{ $group->id }}">
            <span class="text-info">
                @if($group->flag_system)
                    @lang('crud.menu.'.$group->code)
                @else
                    {{$group->name}}
                @endif
            </span></a>
    </div>

    @isset($group->tables)
        <div class="list-group collapse mb-2  @if($table->table_group_id == $group->id) show @endif" id="menu{{ $group->id }}">
            @foreach($group->tables as $tableMenu)
                <a href="{{ env('APP_URL') }}/crud/{{ $tableMenu->url }}/list" class="list-group-item list-group-item-action @if($table->code == $tableMenu->code) bg-light @endif">
                    @if(empty($tableMenu->fa))
                        <i class="fas fa-table fa-fw mr-2"></i>
                    @else
                        <i class="fas fa-{{ $tableMenu->fa }} fa-fw mr-2"></i>
                    @endif
                    @if($tableMenu->flag_system)
                        @lang('crud.menu.'.$tableMenu->code)
                    @else
                        {{$tableMenu->name}}
                    @endif
                </a>
            @endforeach
        </div>
    @endisset

@endforeach