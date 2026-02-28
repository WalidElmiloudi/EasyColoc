    <aside class="w-72 bg-white/90 backdrop-blur-sm border-r border-slate-200 flex flex-col shadow-xl">
        <!-- logo / app name -->
        <div class="p-6 border-b border-slate-100">
            <div class="flex items-center gap-2.5">
                <div class="bg-indigo-600 text-white p-2 rounded-xl shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                    </svg>
                </div>
                <span class="text-xl font-semibold text-slate-800">EasyColoc</span>
            </div>
        </div>

        <!-- user summary (avatar + name + role badge) -->
        <div class="p-6 border-b border-slate-100">
            <div class="flex items-center gap-3">
                <div
                    class="w-12 h-12 rounded-full bg-indigo-100 border-2 border-indigo-200 flex items-center justify-center text-indigo-700 font-semibold text-lg">
                    <i class="fa-solid fa-user"></i></div>
                <div>
                    <p class="font-semibold text-slate-800">{{ auth()->user()->name }}</p>
                    <div class="flex items-center gap-2 mt-0.5">
                        <span class="text-xs text-slate-500">{{ auth()->user()->email }}</span>
                        <!-- badge : admin / member (dynamic look) -->
                        <span
                            class="bg-amber-100 text-amber-700 text-[10px] font-medium px-2 py-0.5 rounded-full border border-amber-200">{{ auth()->user()->role }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- navigation menu (grouped) -->
        <nav class="flex-1 overflow-y-auto py-4 px-4 sidebar-scroll">
            <ul class="space-y-1.5">
                <!-- dash home (active) -->
                <li>
                    <a href="{{ route('home') }}"
                        class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-xl text-slate-600 hover:bg-slate-100 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                        <span>Tableau de bord</span>
                    </a>
                </li>
                <!-- colocation (member & admin) -->
                @if (auth()->user()->colocation)
                <li>
                        <a href="{{ route('colocations.show', auth()->user()->colocation->id) }}"
                            class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-xl text-slate-600 hover:bg-slate-100 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.8" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                            </svg>
                            <span>Ma colocation</span>
                        </a>
                      </li>
                      <!-- dépenses (common for both) -->
                      <li>
                        <a href="{{ route('expences.show') }}"
                        class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-xl text-slate-600 hover:bg-slate-100 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                      </svg>
                      <span>Dépenses</span>
                    </a>
                  </li>
                  <!-- dettes (common) -->
                  <li>
                    <a href="#"
                    class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-xl text-slate-600 hover:bg-slate-100 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15" />
                  </svg>
                  <span>Dettes</span>
                </a>
              </li>
              @endif
              
              <!-- DIVIDER (admin section) -->
              <li class="pt-4 mt-2 border-t border-slate-200">
                <p class="px-4 text-xs font-semibold text-slate-400 uppercase tracking-wider">Administration</p>
              </li>
              <!-- admin dashboard (only admin sees this) -->
              @if(auth()->user()->role === 'admin')
              <li>
                    <a href="#"
                        class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-xl text-slate-600 hover:bg-slate-100 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
                        </svg>
                        <span>Admin dashboard</span>
                    </a>
                </li>
                @endif
                <!-- gérer les membres (admin only) -->
                @if(auth()->user()->colocation_role === 'owner')
                <li>
                    <a href="#"
                        class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-xl text-slate-600 hover:bg-slate-100 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                        </svg>
                        <span>Gérer les membres</span>
                    </a>
                </li>
                @endif
            </ul>
        </nav>

        <!-- bottom logout / profile edit shortcut -->
        <div class="p-4 border-t border-slate-200">
            <a href="{{ route('logout') }}"
                class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-xl text-slate-600 hover:bg-slate-100 transition">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3h9" />
                </svg>
                <span>Déconnexion</span>
            </a>
        </div>
    </aside>
