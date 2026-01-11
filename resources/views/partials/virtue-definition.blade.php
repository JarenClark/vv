@if (isset($virtue_id))

    @php($virtue = get_term($virtue_id))
    <section class="bg-blue-50">
        <div class="container py-20 ">

            <h2 class="mb-4">
                {!! $virtue->name !!}
            </h2>
            @php($grade_def = 0)
            @if (has_term('', 'grade-level', get_the_ID()))
                @php($defs = get_field('virtue_definitions', $virtue_id))
                @foreach ($defs as $def)
                    @if ($def['age_range'] == get_the_terms(get_the_ID(), 'grade-level')[0]->term_id)
                        @php($grade_def = 1)
                        <div class="richtext">

                            {!! $def['description'] !!}
                        </div>
                    @endif
                @endforeach
                @if ($grade_def == 0)
                    <div class="richtext">
                        {!! term_description($virtue_id) !!}
                    </div>
                @endif
            @else
                <div class="richtext">
                    {!! term_description($virtue_id) !!}
                </div>
            @endif
        </div>
    </section>
@endif
