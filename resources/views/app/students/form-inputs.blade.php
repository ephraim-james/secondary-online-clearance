@php $editing = isset($student) @endphp

<div class="row">
        <x-inputs.hidden name="user_id" :value="old('id_number', $editing ? $student->user->id : Auth::user()->id)"></x-inputs.hidden>

    <x-inputs.group class="col-sm-12 col-lg-6 mt-4">
        <x-inputs.text name="id_number" label="Student Id card Number" :value="old('id_number', $editing ? $student->id_number : '')" maxlength="255" placeholder="Student Id card Number"
            required></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6 mt-4">
        <x-inputs.select name="level" label="Class Level">
            @php $selected = old('level', ($editing ? $student->level : '')) @endphp
            <option value="CSEE" {{ $selected == 'CSEE' ? 'selected' : '' }}>O - LEVEL</option>
            <option value="ACSEE" {{ $selected == 'ACSEE' ? 'selected' : '' }}>A - LEVEL</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6 mt-4">
        <x-inputs.text name="block_number" label="Domitory Name" :value="old('block_number', $editing ? $student->block_number : '')" maxlength="255"
            placeholder="Domitory Name"></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6 mt-4">
        <x-inputs.text name="room_number" label="Room Name/ Number" :value="old('room_number', $editing ? $student->room_number : '')" maxlength="255"
            placeholder="Room Name/ Number"></x-inputs.text>
    </x-inputs.group>
</div>
