<x-vue-layout>


    <div id="assessment">
        <perform-assessment assessment-id="{{$assessment->id}}"></perform-assessment>
    </div>

    @push('scripts')
        <script src="{!! mix("js/assessments/assessment.js") !!}" defer></script>
    @endPush

{{--    @include('components.js-vars')--}}

</x-vue-layout>


