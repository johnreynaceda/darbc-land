@section('title', 'Manage Settings')
<x-main-layout>
    <div x-cloak x-data="{ activeTab: 'users' }">
        <div>
            <div class="hidden sm:block">
              <div class="border-b border-gray-200">
                <nav class="-mb-px flex" aria-label="Tabs">
                  <!-- Current: "border-indigo-500 text-indigo-600", Default: "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" -->
                  <a href="#" class="border-indigo-500 text-indigo-600 hover:text-gray-700 hover:border-gray-300 w-1/2 py-4 px-1 text-center border-b-2 font-bold text-sm"
                    :class="{ 'border-indigo-500 text-indigo-600': activeTab === 'users', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': activeTab !== 'users' }"
                    @click.prevent="activeTab = 'users'" aria-current="page">Users</a>

                  <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 w-1/2 py-4 px-1 text-center border-b-2 font-bold text-sm"
                    :class="{ 'border-indigo-500 text-indigo-600': activeTab === 'photo', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': activeTab !== 'photo' }"
                    @click.prevent="activeTab = 'photo'">Dashboard Photo</a>

                  {{-- <a href="#" class="border-transparent text-gray-500 w-1/4 py-4 px-1 text-center border-b-2 font-bold text-sm"
                    :class="{ 'border-indigo-500 text-indigo-600': activeTab === 'signatories', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': activeTab !== 'signatories' }"
                    @click.prevent="activeTab = 'signatories'">Signatories</a> --}}

                  {{-- <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 w-1/4 py-4 px-1 text-center border-b-2 font-bold text-sm"
                    :class="{ 'border-indigo-500 text-indigo-600': activeTab === 'logo', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': activeTab !== 'logo' }"
                    @click.prevent="activeTab = 'logo'">Logo</a> --}}
                  {{-- <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 w-1/4 py-4 px-1 text-center border-b-2 font-bold text-sm"
                    :class="{ 'border-indigo-500 text-indigo-600': activeTab === 'supervisor', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': activeTab !== 'supervisor' }"
                    @click.prevent="activeTab = 'supervisor'">Supervisor Code</a> --}}
                </nav>
              </div>
            </div>
          </div>

          <div x-show="activeTab === 'users'">
            <div class="flex justify-center items-center">
                <div class="relative block mt-3 w-full rounded-lg text-center focus:outline-none">
                    <span class="mt-2 block text-gray-600">
                          <livewire:settings.manage-users />
                    </span>
                </div>
            </div>
          </div>

          <div x-show="activeTab === 'photo'">
            <div class="flex justify-center items-center">
                <div class="relative block mt-3 w-full rounded-lg text-center focus:outline-none">
                    <span class="mt-2 block text-gray-600">
                          <livewire:settings.manage-photo />
                    </span>
                </div>
            </div>
          </div>

          {{-- <div x-show="activeTab === 'signatories'">
            <div class="flex justify-center items-center">
                <div class="relative block mt-3 w-full rounded-lg text-center focus:outline-none">
                    <span class="mt-2 block text-gray-600">
                        <div class="">
                            <livewire:report-signatory />
                        </div>
                        <div class="mt-10">
                            <livewire:signatories />
                        </div>
                    </span>
                </div>
            </div>
          </div> --}}

          {{-- <div x-show="activeTab === 'supervisor'">
            <div class="flex justify-center items-center">
                <div class="relative block mt-3 w-full rounded-lg text-center focus:outline-none">
                    <span class="mt-2 block text-gray-600">
                        <livewire:supervisor-code />
                    </span>
                </div>
            </div>
          </div> --}}

        </div>
</x-main-layout>
