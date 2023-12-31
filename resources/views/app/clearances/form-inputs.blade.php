@php $editing = isset($clearance) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12 col-lg-4 mt-4">
        <x-inputs.select name="student_id" label="Student" required>
            @php $selected = old('student_id', ($editing ? $clearance->student_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Student</option>
            @foreach ($students as $value => $label)
                <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }}>{{ $label }}
                </option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-4 mt-4">
        <x-inputs.text name="name" label="Name" :value="old('name', $editing ? $clearance->name : '')" maxlength="255" placeholder="Name"
            required></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-4 mt-4">
        <x-inputs.text name="registration_number" label="Registration Number" :value="old('registration_number', $editing ? $clearance->registration_number : '')" maxlength="255"
            placeholder="Registration Number" required></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-4 mt-4">
        <x-inputs.text name="block_number" label="Block Number" :value="old('block_number', $editing ? $clearance->block_number : '')" maxlength="255"
            placeholder="Block Number"></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-4 mt-4">
        <x-inputs.text name="room_number" label="Room Number" :value="old('room_number', $editing ? $clearance->room_number : '')" maxlength="255"
            placeholder="Room Number"></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-4 mt-4">
        <x-inputs.text name="level" label="Level" :value="old('level', $editing ? $clearance->level : '')" maxlength="255" placeholder="Level"
            required></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-4 mt-4">
        <x-inputs.select name="librarian" label="Wadern">
            @php $selected = old('librarian', ($editing ? $clearance->{'librarian'} : '0')) @endphp
            <option value="0" {{ $selected == '0' ? 'selected' : '' }}>0</option>
            <option value="1" {{ $selected == '1' ? 'selected' : '' }}>1</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-4 mt-4">
        <x-inputs.select name="bursar" label="Librarian Udsm">
            @php $selected = old('bursar', ($editing ? $clearance->{'bursar'} : '0')) @endphp
            <option value="0" {{ $selected == '0' ? 'selected' : '' }}>0</option>
            <option value="1" {{ $selected == '1' ? 'selected' : '' }}>1</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-4 mt-4">
        <x-inputs.select name="class_teacher" label="Librarian Cse">
            @php $selected = old('class_teacher', ($editing ? $clearance->{'class_teacher'} : '0')) @endphp
            <option value="0" {{ $selected == '0' ? 'selected' : '' }}>0</option>
            <option value="1" {{ $selected == '1' ? 'selected' : '' }}>1</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-4 mt-4">
        <x-inputs.select name="matron_patron" label="matron_patron">
            @php $selected = old('matron_patron', ($editing ? $clearance->matron_patron : '0')) @endphp
            <option value="0" {{ $selected == '0' ? 'selected' : '' }}>0</option>
            <option value="1" {{ $selected == '1' ? 'selected' : '' }}>1</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-4 mt-4">
        <x-inputs.select name="store_keeper" label="store_keeper">
            @php $selected = old('store_keeper', ($editing ? $clearance->store_keeper : '0')) @endphp
            <option value="0" {{ $selected == '0' ? 'selected' : '' }}>0</option>
            <option value="1" {{ $selected == '1' ? 'selected' : '' }}>1</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-4 mt-4">
        <x-inputs.select name="head_master" label="Smart Card">
            @php $selected = old('head_master', ($editing ? $clearance->{'head_master'} : '0')) @endphp
            <option value="0" {{ $selected == '0' ? 'selected' : '' }}>0</option>
            <option value="1" {{ $selected == '1' ? 'selected' : '' }}>1</option>
        </x-inputs.select>
    </x-inputs.group>
</div>
