@use('App\Helpers\Url')
@include('static/head', [
    "lang"  => app()->getLocale(),
    "title" => __("kernel.title"),
    "desc"  => __("kernel.desc"),
])

<body>
@include('static/header')

<!-- Kernel -->
<x-hero class="mt-4" id="kernel">
	<x-slot:title>
		{{ __("kernel.title") }}
	</x-slot>

	<x-slot:desc>
		{{ __("kernel.desc") }}
	</x-slot>

	<!-- Go to -->
	<p>
		{{ __("kernel.go-to.title") }}:
		<br>

		<!-- Intro -->
		<x-tag-xs href="intro">
			{{ __("kernel.go-to.intro") }}
		</x-tag-xs>

		&nbsp;

		<!-- Setup -->
		<x-tag-xs href="setup">
			{{ __("kernel.go-to.setup") }}
		</x-tag-xs>

		&nbsp;

		<!-- Extra -->
		<x-tag-xs href="extra">
			{{ __("kernel.go-to.extra") }}
		</x-tag-xs>
	</p>

	<!-- Intro -->
	<x-card class="m-3">
		<x-tag-xl id="intro">{{ __("kernel.go-to.intro") }}</x-tag-xl>

		<p class="mt-1">
			{{ __("kernel.intro.components.desc") }}
		</p>

		<ul>
			<!-- Distro -->
			<x-list-item name="{{ __('kernel.intro.components.distro.name') }}">
				{!! Url::makeLink("https://gentoo.org",
					__("kernel.intro.components.distro.value")
				) !!}
			</x-list-item>

			<!-- Kernel compression -->
			<x-list-item name="{{ __('kernel.intro.components.kcompr.name') }}">
				{{ __("kernel.intro.components.kcompr.value") }}
			</x-list-item>

			<!-- Initramfs compression -->
			<x-list-item name="{{ __('kernel.intro.components.initramfs.name') }}">
				{!! Url::makeLink("https://github.com/dracutdevs/dracut",
					__("kernel.intro.components.initramfs.value")
				) !!}
			</x-list-item>

			<!-- Bootloader -->
			<x-list-item name="{{ __('kernel.intro.components.bootld.name') }}">
				{!! Url::makeLink("https://www.gnu.org/software/grub",
					__("kernel.intro.components.bootld.value")
				) !!}
			</x-list-item>

			<!-- Init -->
			<x-list-item name="{{ __('kernel.intro.components.init.name') }}">
				{!! Url::makeLink("https://github.com/OpenRC/openrc",
					__("kernel.intro.components.init.value")
				) !!}
			</x-list-item>

			<!-- File systems -->
			<x-list-item name="{{ __('kernel.intro.components.fs.name') }}">
				@php
					$esp = __("kernel.links.esp");
					$rootfs = __("kernel.links.rootfs");
				@endphp

				<!-- Fat32 -->
				{!! __("kernel.intro.components.fs.fat32", [
					"esp" => Url::makeLink($esp, "ESP"),
				]) !!},&nbsp;

				<!-- XFS -->
				{!! __("kernel.intro.components.fs.xfs", [
					"rootfs" => Url::makeLink($rootfs, "RootFS"),
				]) !!},&nbsp;

				<!-- Ext4 -->
				{{ __('kernel.intro.components.fs.ext4') }}.
			</x-list-item>

			<!-- Logind -->
			<x-list-item name="{{ __('kernel.intro.components.logind.name') }}">
				{!! Url::makeLink("https://wiki.gentoo.org/wiki/Elogind",
					__("kernel.intro.components.logind.value")
				) !!}
			</x-list-item>
		</ul>

		<!-- Note -->
		<x-card-alert>
			{!! __('kernel.intro.note') !!}
		</x-card-alert>

		<!-- Configs -->
		<p>
			{{ __('kernel.intro.configs.desc') }}:
		</p>

		<ol>
			<!-- T470p -->
			<x-list-item name="config">
				{!! __('kernel.intro.configs.config') !!}
			</x-list-item>

			<!-- T440p -->
			<x-list-item name="config.t440p">
				{!! __('kernel.intro.configs.config-t440p') !!}
			</x-list-item>

			<!-- PC -->
			<x-list-item name="config.pc">
				{!! __('kernel.intro.configs.config-pc') !!}
			</x-list-item>
		</ol>

		<p>
			{{ __('kernel.intro.configs.desc2') }}
		</p>

		<p>
			{{ __('kernel.intro.configs.desc3') }}
		</p>
	</x-card>

	<!-- Setup -->
	<x-card class="m-3">
		<x-tag-xl id="setup">{{ __("kernel.go-to.setup") }}</x-tag-xl>

		<p class="mt-1">
			@php
				$nonfree = __("kernel.links.nonfree");
				$microcode = __("kernel.links.microcode");
			@endphp

			{!! __("kernel.setup.desc", [
				"nonfree" => Url::makeLink($nonfree, "nonfree"),
				"microcode" => Url::makeLink($microcode, "microcode"),
			]) !!},&nbsp;
		</p>

		<p class="mt-1">
			@php
				$installkernel = __("kernel.links.installkernel");
			@endphp

			{!! __("kernel.setup.desc2", [
				"installkernel" => Url::makeLink($installkernel, "sys-kernel/installkernel"),
			]) !!},&nbsp;
		</p>

		<!-- Step 1 -->
		<x-tag-md id="s1">{{ __("kernel.setup.s1.title") }}</x-tag-md>

		<p class="mt-0">
			{!! __("kernel.setup.s1.desc") !!}
		</p>

		<p>
			<pre>
			<code>
				git clone --recurse-submodules "https://github.com/saloniamatteo/kernel" /usr/src/usr-kernel<br>
				cd /usr/src/usr-kernel
			</code>
			</pre>
		</p>

		<x-card-info>{!! __("kernel.setup.s1.note") !!}</x-card-info>

		<!-- Step 2 -->
		<x-tag-md id="s2">{{ __("kernel.setup.s2.title") }}</x-tag-md>

		<p class="mt-0">
			{!! __("kernel.setup.s2.desc") !!}
		</p>

		<p>
			<pre>
			<code>
			$ ls<br>
			<strong>6.12.8-gentoo</strong> # <-- Kernel config <br>
			<em>bore-scheduler</em><br>
			<em>clear-patches</em><br>
			<em>kernel_compiler_patch</em><br>
			<em>patches</em><br>
			<em>v4l2loopback</em><br>
			<em>build.sh</em><br>
			<em>README.md</em>
			</code>
			</pre>
		</p>

		<p>
			{!! __("kernel.setup.s2.desc2") !!}
		</p>

		<x-card-info>{!! __("kernel.setup.s2.note") !!}</x-card-info>

		<!-- Step 3 -->
		<x-tag-md id="s3">{{ __("kernel.setup.s3.title") }}</x-tag-md>

		<p class="mt-0">
			{!! __("kernel.setup.s3.desc") !!}
		</p>

		<ul>
			<!-- CUSTDIR -->
			<x-list-item-code name="CUSTDIR">
				{!! __("kernel.setup.s3.custdir") !!}
				Default: <code>/usr/src/usr-kernel</code>
			</x-list-item-code>

			<!-- KVER -->
			<x-list-item-code name="KVER">
				{!! __("kernel.setup.s3.kver") !!}
			</x-list-item-code>

			<!-- PVER -->
			<x-list-item-code name="PVER">
				{!! __("kernel.setup.s3.pver") !!}
			</x-list-item-code>

			<!-- KERNELDIR -->
			<x-list-item-code name="KERNELDIR">
				{!! __("kernel.setup.s3.kerneldir") !!}
				Default: <code>/usr/src</code>
			</x-list-item-code>

			<!-- JOBS -->
			<x-list-item-code name="JOBS">
				{!! __("kernel.setup.s3.jobs") !!}
			</x-list-item-code>

			<!-- CONFIGFILE -->
			<x-list-item-code name="CONFIGFILE">
				{!! __("kernel.setup.s3.configfile") !!}
				Default: <code>config</code>
			</x-list-item-code>
		</ul>

		<!-- Step 4 -->
		<x-tag-md id="s4">{{ __("kernel.setup.s4.title") }}</x-tag-md>

		<p class="mt-0">
			{!! __("kernel.setup.s4.desc") !!}
		</p>

		<!-- Table -->
		<x-table>
			<x-slot:head>
				<th>{{ __("kernel.setup.s4.table.sflag") }}</th>
				<th>{{ __("kernel.setup.s4.table.lflag") }}</th>
				<th class="u-align-middle">
					{{ __("kernel.setup.s4.table.desc") }}
				</th>
			</x-slot>

			<x-slot:body>
				<!-- Skip build -->
				<tr>
					<td>-b</td>
					<td>--skip-build</td>
					<td>{{ __("kernel.setup.s4.table.b") }}</td>
				</tr>

				<!-- Skip copying config -->
				<tr>
					<td>-c</td>
					<td>--skip-cfg</td>
					<td>{!! __("kernel.setup.s4.table.c") !!}</td>
				</tr>

				<!-- Distcc -->
				<tr>
					<td>-d</td>
					<td>--distcc</td>
					<td>
						@php
							$distcc = __("kernel.links.distcc");
						@endphp

						{!! __("kernel.setup.s4.table.d", [
							"distcc" => Url::makeLink($distcc, "distcc"),
						]) !!}
					</td>
				</tr>

				<!-- Ccache -->
				<tr>
					<td>-e</td>
					<td>--ccache</td>
					<td>
						@php
							$ccache = __("kernel.links.ccache");
						@endphp

						{!! __("kernel.setup.s4.table.e", [
							"ccache" => Url::makeLink($ccache, "ccache"),
						]) !!}
					</td>
				</tr>

				<!-- Fast math -->
				<tr>
					<td>-f</td>
					<td>--fastmath</td>
					<td>{{ __("kernel.setup.s4.table.f") }}</td>
				</tr>

				<!-- Graphite -->
				<tr>
					<td>-g</td>
					<td>--graphite</td>
					<td>{{ __("kernel.setup.s4.table.g") }}</td>
				</tr>

				<!-- Help -->
				<tr>
					<td>-h</td>
					<td>--help</td>
					<td>{{ __("kernel.setup.s4.table.h") }}</td>
				</tr>

				<!-- Clear Linux patches -->
				<tr>
					<td>-l</td>
					<td>--clearl-ps</td>
					<td>{{ __("kernel.setup.s4.table.l") }}</td>
				</tr>

				<!-- Menuconfig -->
				<tr>
					<td>-m</td>
					<td style="min-width: 120px">--menuconfig</td>
					<td>{!! __("kernel.setup.s4.table.m") !!}</td>
				</tr>

				<!-- CPU opts -->
				<tr>
					<td>-o</td>
					<td>--cpu-opts</td>
					<td>{{ __("kernel.setup.s4.table.o") }}</td>
				</tr>

				<!-- Patches -->
				<tr>
					<td>-p</td>
					<td>--patches</td>
					<td>{{ __("kernel.setup.s4.table.p") }}</td>
				</tr>

				<!-- BORE sched -->
				<tr>
					<td>-r</td>
					<td>--bore</td>
					<td>{{ __("kernel.setup.s4.table.r") }}</td>
				</tr>

				<!-- V4L2 loopback -->
				<tr>
					<td>-v</td>
					<td>--v4l2</td>
					<td>
						@php
							$v4l2loopback = __("kernel.links.v4l2loopback");
						@endphp

						{!! __("kernel.setup.s4.table.v", [
							"v4l2loopback" => Url::makeLink($v4l2loopback, "v4l2loopback"),
						]) !!}
					</td>
				</tr>

				<!-- Variables -->
				<tr>
					<td>-z</td>
					<td>--vars</td>
					<td>{{ __('kernel.setup.s4.table.z') }}</td>
				</tr>
			</x-slot>
		</x-table>

		<!-- Step 5 -->
		<x-tag-md id="s5">{{ __("kernel.setup.s5.title") }}</x-tag-md>

		<p class="mt-0">
			{{ __("kernel.setup.s5.desc") }}
		</p>

		<p>
			<pre class="mb-2">
				<code>./build.sh -l -m -o -p</code>
			</pre>
		</p>

		<p>
			{{ __("kernel.setup.s5.cmd.desc") }}:
		</p>

		<ul>
			<!-- Clear Linux patches -->
			<x-list-item-code name="-l">
				{{ __('kernel.setup.s5.cmd.l') }}
			</x-list-item-code>

			<!-- Menuconfig -->
			<x-list-item-code name="-m">
				{!! __('kernel.setup.s5.cmd.m') !!}
			</x-list-item-code>

			<!-- CPU opts -->
			<x-list-item-code name="-o">
				{{ __('kernel.setup.s5.cmd.o') }}
			</x-list-item-code>

			<!-- Patches -->
			<x-list-item-code name="-p">
				{{ __('kernel.setup.s5.cmd.p') }}
			</x-list-item-code>
		</ul>

		<p>
			{!! __("kernel.setup.s5.desc2") !!}
		</p>

		<p>
			{!! __("kernel.setup.s5.desc3") !!}
		</p>

		<p>
			<pre>
			<code>
				cp /usr/src/linux/.config 6.12.8-gentoo/config.new<br>
				diff -u 6.12.8-gentoo/config{,.new} | vim
			</code>
			</pre>
		</p>

		<p>
			{!! __("kernel.setup.s5.desc4") !!}
		</p>

		<p>
			{!! __("kernel.setup.s5.desc5") !!}
		</p>

		<p>
			{!! __("kernel.setup.s5.desc6") !!}
		</p>

		<p>
			<pre>
			<code>
				mv 6.12.8-gentoo/config{.new,}
			</code>
			</pre>
		</p>

		<!-- Step 6 -->
		<x-tag-md id="s6">{{ __("kernel.setup.s6.title") }}</x-tag-md>

		<p class="mt-0">
			{!! __("kernel.setup.s6.desc") !!}
		</p>

		<p>
			<pre class="mb-2">
				<code>./build.sh -f -l -o -p</code>
			</pre>
		</p>

		<p>
			{!! __("kernel.setup.s6.desc2") !!}
		</p>

		<x-card-info>
			{{ __("kernel.setup.s6.note") }}
		</x-card-info>

		<p>
			{!! __("kernel.setup.s6.desc3") !!}
		</p>
	</x-card>

	<!-- Extra -->
	<x-card class="m-3">
		<x-tag-xl id="extra">{{ __("kernel.go-to.extra") }}</x-tag-xl>

		<p class="mt-1">
			{{ __("kernel.extra.desc") }}
		</p>

		<!-- V4L2loopback -->
		<x-tag-md id="e-v4l2">{{ __("kernel.extra.v4l2.title") }}</x-tag-md>

		<p class="mt-0">
			{{ __("kernel.extra.v4l2.desc") }}
		</p>

		<p>
			{!! __("kernel.extra.v4l2.desc2") !!}
		</p>

		<p>
			<pre class="mb-2">
				<code>options v4l2loopback exclusive_caps=1 card_label="Camera2"</code>
			</pre>
		</p>

		<p>
			{!! __("kernel.extra.v4l2.desc3") !!}
		</p>

		<!-- Initramfs -->
		<x-tag-md id="e-initramfs">{{ __("kernel.extra.initramfs.title") }}</x-tag-md>

		<p class="mt-0">
			{{ __("kernel.extra.initramfs.desc") }}
		</p>

		<p>
			{!! __("kernel.extra.initramfs.desc2") !!}
		</p>

		<p>
			<pre><code>
			# Equivalent to -H<br>
			hostonly="yes"<br>
			<br>
			# Add various modules<br>
			# Module: description<br>
			# ==================================<br>
			# base: include basic utilities<br>
			# dash: include /bin/dash as /bin/sh<br>
			# fs-lib: include filesystem tools like mount<br>
			# kernel-modules: include kernel modules<br>
			# rescue: include various utils for rescue mode<br>
			# resume: allow initramfs to resume from low-power state<br>
			# rootfs-block: mount block device that contains rootfs<br>
			# shutdown: set up hooks to run on shutdown<br>
			# udev-rules: include udev and some basic rules<br>
			# usrmount: mount /usr<br>
			dracutmodules+=" base dash fs-lib kernel-modules rescue resume rootfs-block shutdown udev-rules usrmount "<br>
			<br>
			# Do not include bash (we use dash)<br>
			omit_dracutmodules="bash"<br>
			<br>
			# Include elogind<br>
			install_items="/lib64/elogind/elogind-uaccess-command"<br>
			<br>
			# Use lz4 to compress the initramfs<br>
			compress="lz4"<br>
			<br>
			# Add early microcode loading<br>
			early_microcode="yes"
			</code></pre>
		</p>

		<p>
			{{ __("kernel.extra.initramfs.desc3") }}
		</p>

		<p>
			<pre class="mb-2">
				<code>dracut --kver 6.8.2-gentoo -f</code>
			</pre>
		</p>

		<p>
			{!! __("kernel.extra.initramfs.desc4") !!}
		</p>

		<p>
			{!! __("kernel.extra.initramfs.desc5") !!}
		</p>

		<!-- Bootloader -->
		<x-tag-md id="e-bootloader">{{ __("kernel.extra.bootloader.title") }}</x-tag-md>

		<p class="mt-0">
			{!! __("kernel.extra.bootloader.desc") !!}
		</p>

		<p>
			{{ __("kernel.extra.bootloader.desc2") }}
		</p>

		<p>
			{{ __("kernel.extra.bootloader.desc3") }}
		</p>

		<p>
			<pre class="mb-2">
				<code>grub-mkconfig -o /boot/grub/grub.cfg</code>
			</pre>
		</p>

		<p>
			{{ __("kernel.extra.bootloader.desc4") }}
		</p>
	</x-card>

	@include('static/home')
</x-hero>

@include('static/footer')
</body>
</html>
