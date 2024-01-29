@section('title', 'Manage Settings')
<x-main-layout>
    <div x-cloak x-data="{ activeTab: 'users' }">
        {{-- <div class="sm:hidden">
          <label for="tabs" class="sr-only">Select a tab</label>
          <!-- Use an "onChange" listener to redirect the user to the selected tab URL. -->
          <select id="tabs" name="tabs" class="block w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
            <option>My Account</option>
            <option>Company</option>
            <option selected>Team Members</option>
            <option>Billing</option>
          </select>
        </div> --}}
        <div class="hidden sm:block">
          <nav class="flex space-x-4" aria-label="Tabs">
            <!-- Current: "bg-indigo-100 text-indigo-700", Default: "text-gray-500 hover:text-gray-700" -->
            <a href="#"

            class="text-gray-500 hover:text-gray-700 rounded-md px-3 py-2 text-sm font-medium"
            :class="{ 'bg-indigo-100 text-indigo-700 rounded-md px-3 py-2 text-sm font-medium': activeTab === 'users', 'text-gray-500 hover:text-indigo-700 rounded-md px-3 py-2 text-sm font-medium': activeTab !== 'users' }"
            @click.prevent="activeTab = 'users'">Users</a>
            <a href="#" class="text-gray-500 hover:text-gray-700 rounded-md px-3 py-2 text-sm font-medium"
            :class="{ 'bg-indigo-100 text-indigo-700 rounded-md px-3 py-2 text-sm font-medium': activeTab === 'photo', 'text-gray-500 hover:text-indigo-700 rounded-md px-3 py-2 text-sm font-medium': activeTab !== 'photo' }"
            @click.prevent="activeTab = 'photo'">Dashboard Photo</a>
            <a href="#" class="text-gray-500 hover:text-gray-700 rounded-md px-3 py-2 text-sm font-medium"
            :class="{ 'bg-indigo-100 text-indigo-700 rounded-md px-3 py-2 text-sm font-medium': activeTab === 'status', 'text-gray-500 hover:text-indigo-700 rounded-md px-3 py-2 text-sm font-medium': activeTab !== 'status' }"
            @click.prevent="activeTab = 'status'">Land Status</a>
            <a href="#" class="text-gray-500 hover:text-gray-700 rounded-md px-3 py-2 text-sm font-medium"
            :class="{ 'bg-indigo-100 text-indigo-700 rounded-md px-3 py-2 text-sm font-medium': activeTab === 'title_status', 'text-gray-500 hover:text-indigo-700 rounded-md px-3 py-2 text-sm font-medium': activeTab !== 'title_status' }"
            @click.prevent="activeTab = 'title_status'">Land Title Status</a>
            <a href="#" class="text-gray-500 hover:text-gray-700 rounded-md px-3 py-2 text-sm font-medium"
            :class="{ 'bg-indigo-100 text-indigo-700 rounded-md px-3 py-2 text-sm font-medium': activeTab === 'other_attachments', 'text-gray-500 hover:text-indigo-700 rounded-md px-3 py-2 text-sm font-medium': activeTab !== 'other_attachments' }"
            @click.prevent="activeTab = 'other_attachments'">Other Attachments</a>
          </nav>
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

          <div x-show="activeTab === 'status'">
            <div class="flex justify-center items-center">
                <div class="relative block mt-3 w-full rounded-lg text-center focus:outline-none">
                    <span class="mt-2 block text-gray-600">
                          <livewire:settings.manage-status />
                    </span>
                </div>
            </div>
          </div>

          <div x-show="activeTab === 'title_status'">
            <div class="flex justify-center items-center">
                <div class="relative block mt-3 w-full rounded-lg text-center focus:outline-none">
                    <span class="mt-2 block text-gray-600">
                          <livewire:settings.manage-title-status />
                    </span>
                </div>
            </div>
          </div>

          <div x-show="activeTab === 'other_attachments'">
            <div class="flex justify-center items-center">
                <div class="relative block mt-3 w-full rounded-lg text-center focus:outline-none">
                    <span class="mt-2 block text-gray-600">
                          <livewire:settings.manage-other-attachments />
                    </span>
                </div>
            </div>
          </div>

      </div>

</x-main-layout>
