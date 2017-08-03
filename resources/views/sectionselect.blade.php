@foreach ($sections as $section)
<option value="{{ $section->section_name }}">{{ $section->section_name }}</option>
@endforeach