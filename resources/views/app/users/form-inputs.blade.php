@php $editing = isset($user) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12 col-lg-4 mt-4">
        <x-inputs.text name="name" label="Name" :value="old('name', $editing ? $user->name : '')" maxlength="255" placeholder="Name"
            required></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-4 mt-4">
        <x-inputs.email name="email" label="Email" :value="old('email', $editing ? $user->email : '')" maxlength="255" placeholder="Email"
            required></x-inputs.email>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-4 mt-4">
        <x-inputs.select name="role" label="Role">
            @php $selected = old('role', ($editing ? $user->role : '')) @endphp
            <option value="student" {{ $selected == 'student' ? 'selected' : '' }}>Student</option>
            <option value="librarian" {{ $selected == 'librarian' ? 'selected' : '' }}>Hall wadern</option>
            <option value="bursar" {{ $selected == 'bursar' ? 'selected' : '' }}>Librarian udsm</option>
            <option value="class_teacher" {{ $selected == 'class_teacher' ? 'selected' : '' }}>Librarian cse</option>
            <option value="store_keeper" {{ $selected == 'store_keeper' ? 'selected' : '' }}>store_keeper</option>
            <option value="head_master" {{ $selected == 'head_master' ? 'selected' : '' }}>Smart card</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-4 mt-4">
        <x-inputs.text name="username" label="Username" :value="old('username', $editing ? $user->username : '')" maxlength="255" placeholder="Username"
            required></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-4 mt-4">
        <x-inputs.password name="password" label="Password" maxlength="255" placeholder="Password"
            :required="!$editing"></x-inputs.password>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-4 mt-4">
        <div x-data="imageViewer('{{ $editing && $user->image ? url(\Storage::url($user->image)) : '' }}')">
            <x-inputs.partials.label name="image" label="Image"></x-inputs.partials.label><br />

            <!-- Show the image -->
            <template x-if="imageUrl">
                <img :src="imageUrl" class="object-cover rounded border border-gray-200"
                    style="width: 100px; height: 100px;" />
            </template>

            <!-- Show the gray box when image is not available -->
            <template x-if="!imageUrl">
                <div class="border rounded border-gray-200 bg-gray-100" style="width: 100px; height: 100px;"></div>
            </template>

            <div class="mt-2">
                <input type="file" name="image" id="image" @change="fileChosen" />
            </div>

            @error('image')
                @include('components.inputs.partials.error')
            @enderror
        </div>
    </x-inputs.group>

    @if (Auth::user()->can('view-any', Spatie\Permission\Models\Role::class) ||
            Auth::user()->can('view-any', Spatie\Permission\Models\Permission::class))
        <div class="form-group col-sm-12 mt-4">
            <h4>{{ _('Choose Role') }}</h4>

            @foreach ($roles as $role)
                <div>
                    <x-inputs.radio id="role{{ $role->id }}" name="roles[]" label="{{ ucfirst($role->name) }}"
                        value="{{ $role->id }}" :checked="isset($user) ? $user->hasRole($role) : false" :add-hidden-value="false"></x-inputs.radio>
                </div>
            @endforeach
        </div>
    @endif
</div>
