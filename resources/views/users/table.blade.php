  <div class="container mx-auto mt-10 mb-10 px-10">
      <div class="grid grid-cols-8 gap-4 mb-4 p-5">
          <div class="col-span-4 mt-2">
              <h1 class="text-3xl font-bold">
                  USER LIST
              </h1>
          </div>
          <div class="col-span-4">
              <div class="flex justify-end">
                  <a href="{{ route('user.create') }}"
                      class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                      id="add-user-btn">Add user</a>
              </div>
          </div>
      </div>
      <div class="bg-white p-5 rounded shadow-sm">
          <!-- Notifikasi menggunakan flash session data -->
          @if (session('success'))
              <div class="p-3 rounded bg-green-500 text-green-100 mb-4">
                  {{ session('success') }}
              </div>
          @endif
          <div class="relative overflow-x-auto">
              <table class="w-full text-sm text-left rtl:text-right text-neutral-500 dark:text-neutral-400">
                  <thead
                      class="text-xs text-neutral-700 uppercase bg-neutral-50 dark:bg-neutral-700 dark:text-neutral-400">
                      <tr>
                          <th scope="col" class="px-6 py-3">
                              No
                          </th>
                          <th scope="col" class="px-6 py-3">
                              Name
                          </th>
                          <th scope="col" class="px-6 py-3">
                              neighborhoodAssociation
                          </th>
                          <th scope="col" class="px-6 py-3">
                              dasaWisma
                          </th>
                          <th scope="col" class="px-6 py-3">
                              couponNumber
                          </th>
                          <th scope="col" class="px-6 py-3">
                              Action
                          </th>
                      </tr>
                  </thead>
                  <tbody>
                      @forelse ($users as $user)
                          <tr class="bg-white border-b dark:bg-neutral-800 dark:border-neutral-700 border-neutral-200">
                              <td class="px-6 py-4">
                                  {{ $loop->iteration }}
                              </td>
                              <td class="px-6 py-4">
                                  {{ $user->name }}
                              </td>
                              <td class="px-6 py-4">
                                  {{ $user->neighborhoodAssociation }}
                              </td>
                              <td class="px-6 py-4">
                                  {{ $user->dasaWisma }}
                              </td>
                              <td class="px-6 py-4">
                                  {{ $user->couponNumber }}
                              </td>
                              <td class="px-6 py-4">
                                  <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                      action="{{ route('user.destroy', $user) }}" method="POST">

                                      @csrf
                                      @method('DELETE')
                                      <a href="{{ route('user.show', $user) }}" id="{{ $user->id }}-edit-btn"
                                          class="inline-block px-6 py-2.5 bg-blue-400 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-500 hover:shadow-lg focus:bg-blue-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-600 active:shadow-lg transition duration-150 ease-in-out">View</a>

                                      <a href="{{ route('user.edit', $user) }}" id="{{ $user->id }}-edit-btn"
                                          class="inline-block px-6 py-2.5 bg-blue-400 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-500 hover:shadow-lg focus:bg-blue-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-600 active:shadow-lg transition duration-150 ease-in-out">Edit</a>

                                      <button type="submit"
                                          class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out"
                                          id="{{ $user->id }}-delete-btn">Delete
                                      </button>
                                  </form>
                              </td>
                          </tr>

                      @empty
                          <tr>
                              <td class="text-center text-sm text-neutral-900 px-6 py-4 whitespace-nowrap"
                                  colspan="6">
                                  Data Empty
                              </td>
                          </tr>
                      @endforelse
                  </tbody>
              </table>
          </div>

      </div>

      <div class="mt-3">
          {{ $users->links() }}
      </div>
  </div>
