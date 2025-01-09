<?php

// English dict file for kernel
return [
    'title' => 'Kernel',
    'desc' => "Matteo Salonia's Kernel build, optimized to maximize the hardware's performance, and be as light as possible.",

    // Go to
    'go-to' => [
        'title' => 'Go to',
        'intro' => 'Introduction',
        'setup' => 'Setup',
        'extra' => 'Extra',
    ],

    // Intro
    'intro' => [
        'components' => [
            'desc' => 'My setups are based on a system comprised of the following components:',

            'distro' => [
                'name' => 'Distro',
                'value' => 'Gentoo Linux',
            ],

            'kcompr' => [
                'name' => 'Kernel Compression',
                'value' => 'LZ4 for the initramfs, zstd for zswap',
            ],

            'initramfs' => [
                'name' => 'Initramfs',
                'value' => 'Dracut',
            ],

            'bootld' => [
                'name' => 'Bootloader',
                'value' => 'GRUB',
            ],

            'init' => [
                'name' => 'Init',
                'value' => 'OpenRC',
            ],

            'fs' => [
                'name' => 'Filesystem',
                'fat32' => 'FAT32 for the :esp',
                'xfs' => 'XFS for the :rootfs</a>',
                'ext4' => 'ext4 for various things',
            ],

            'logind' => [
                'name' => 'Logind',
                'value' => 'elogind',
            ],
        ],

        // Note
        'note' => "Since I use <b>Gentoo</b>, the package names may vary from your distro's (Arch, Debian, Fedora, ...) packages. Please verify whether the names may vary, and take note of them.",

        // Configs
        'configs' => [
            'desc' => 'There are three default configs',

            'config' => '<strong>ThinkPad T470p</strong>, with CPU <strong>i7-7820HQ</strong> (Kaby Lake, 4C8T), <strong>Nvidia GeForce 940MX</strong> dGPU + <strong>Intel HD 630</strong> iGPU, SATAIII/NVMe SSD, 2560x1440 display.',
            'config-t440p' => '<strong>ThinkPad T440p</strong>, with CPU <strong>i7-4700MQ</strong> (Haswell, 4C8T), <strong>Intel HD4600</strong> iGPU, SATAIII SSD, 1366x768 display.',
            'config-pc' => 'Custom-built PC, with CPU <b>i5-11400</b> (Rocket Lake, 6C12T), <strong>Intel UHD 730</strong> iGPU, NVMe SSD.',

            'desc2' => 'Verify your desired components are enabled in the Kernel, if you choose my config as a starting point. For example, components relative to AMD, Nvidia (not on T470p), NUMA, etc. have been disabled.',
            'desc3' => "If you don't know where to start, use an already existing config that you know works on your hardware, if available, or else use any Kernel's default config, like that provided by your distro, or the Kernel's very own default config.",
        ],
    ],

    // Setup
    'setup' => [
        'desc' => "Make sure to have all the tools necessary to proceed. Verify you have <code>git</code>, <code>gcc</code>, <code>make</code>, etc. Tipically, most compilation tools are provided by packages like <code>base-devel</code>. I suggest you also verify the presence of <code>linux-firmware</code>, in order to have the necessary firmware for any :nonfree hardware. Don't forget to download the :microcode that is most appropriate, whether it be Intel, AMD, or any other. Finally, make sure you have <code>lz4</code> and <code>zstd</code>, in order to compress various Kernel components.",
        'desc2' => "<strong>Gentoo users</strong>: it is highly recommended you use :installkernel to automatically create the initramfs & update the bootloader config, by respecting your system preferences (e.g. initramfs->dracut, bootloader->GRUB).",

        // Step 1
        's1' => [
            'title' => '1. Get the repository',
            'desc' => "We'll use the <code>/usr/src/usr-kernel</code> directory in order to save this project. Make sure you have read and write permissions, in order to create the directory.",

            'note' => "Whenever the chosen directory differs from the default, don't forget to modify the <code class='d'>CUSTDIR</code> variable in <code class='d'>build.sh</code>",
        ],

        // Step 2
        's2' => [
            'title' => '2. Version selection',
            'desc' => "Once you get the repository, choose an available version. To see which version is available, you just need to list the directory contents with <code>ls</code>:",
            'desc2' => "In this example, we'll be using Linux <code>6.12.8-gentoo</code>.",

            'note' => "<u>Your Kernel will surely have a different version</u>. No problem: you just need to copy the folder, and rename it according to your version. For example, if your version is be <code class='d'>6.12.9-zen</code>, you just need to execute: <code class='d'>cp -r 6.12.8-gentoo 6.12.9-zen</code>. Don't forget to modify the <code class='d'>KVER</code> variable whenever the primary version differs (e.g.: <code class='d'>6.12.8</code> -> <code class='d'>6.12.9</code>), and <code class='d'>PVER</code> whenever the secondary/custom version differs (e.g.: <code class='d'>gentoo</code> -> <code class='d'>zen</code>)",
        ],

        // Step 3
        's3' => [
            'title' => '3. Modify the script',
            'desc' => 'Now, we need to verify the contents of <code>build.sh</code>. Modify the file with any text editor, and note the following variables:',

            'custdir' => "this project's directory.",
            'kver' => 'primary Kernel version.',
            'pver' => 'secondary/custom Kernel version.',
            'kerneldir' => "directory where Kernels are stored.",
            'jobs' => 'how many threads to use for compilation. Recommended: physical core count.',
            'configfile' => 'il nome del file di configurazione, che verrà copiato dalla directory al Kernel.',
        ],

        // Step 4
        's4' => [
            'title' => '4. Flag selection',
            'desc' => "After modifying <code>build.sh</code>, we have to set the correct parameters in order to decide what to do.<br>Here's a table with all the parameters (flags).",

            // Table
            'table' => [
                'sflag' => 'Short flag',
                'lflag' => 'Long flag',
                'desc' => 'Description',

                'b' => 'Do not build the Kernel.',
                'c' => 'Do not copy the Kernel config file (<code>config</code>).',
                'd' => 'Use :distcc to speed up Kernel compilation',
                'e' => 'Use :ccache to speed up Kernel compilation',
                'f' => 'Compile the Kernel with Unsafe Fast Math options.',
                'g' => 'Compile the Kernel with Graphite',
                'h' => 'Show the help menu and exit.',
                'l' => 'Apply Clear Linux patches.',
                'm' => 'Execute <code>make menuconfig</code> in the Kernel directory and exit without compiling.',
                'o' => 'Compile the Kernel with CPU family optimizations.',
                'p' => 'Apply user patches.',
                'r' => 'Build Kernel with BORE scheduler',
                'v' => 'Compile the :v4l2loopback module.',
                'z' => 'Print variables and exit.',
            ],
        ],

        // Step 5
        's5' => [
            'title' => '5. Kernel configuration',
            'desc' => "Tipically, it'll be necessary to configure the Kernel, starting from a config file. To do so, you need to run the following as root:",

            // Command
            'cmd' => [
                'desc' => 'This will allow us to',

                'l' => 'Apply Clear Linux patches',
                'm' => 'Configure the Kernel via <code>make menuconfig</code>',
                'o' => 'Apply the CPU family optimization patches',
                'p' => 'Apply included patches',
            ],

            'desc2' => "Once the Kernel config process is done, the new config file will be available as <code>/usr/src/linux/.config</code> (or under <code>\$KERNELDIR/.config</code> whenever <code>KERNELDIR</code> would've been set).",
            'desc3' => 'Now we need to copy <code>.config</code> from the Kernel directory to the chosen Kernel directory (in this case, <code>6.12.8-gentoo</code>), to then compare the two files and see any changes:',

            'desc4' => "The last command executes the <code>diff</code> command, showing the differences between our starting <code>config</code> file, and the new <code>config.new</code> file, to then show everything with the Vim editor. Obviously, it's necessary to modify the name of the <code>config</code> file in the command above whenever needed (example: you use a custom config)",
            'desc5' => "Note the <code>6.12.8-gentoo</code> in both commands: modify this whenever you use a different Kernel version.",
            'desc6' => "After verifying the differences, let's replace our config file with the <code>config.new</code> file, and move on to the actual Kernel compilation:",
        ],

        // Step 6
        's6' => [
            'title' => '6. Kernel compilation',
            'desc' => "After making sure we have everything that's necessary, we can proceed with compiling the Kernel with the following command, executing it as <strong>root</strong>:",

            'desc2' => 'Note the repeated presence of the patch options (<code>-l</code>, <code>-o</code>, <code>-p</code>). This is because the script automatically reverts all changes made by the patches present in the Kernel directory, where possible, and removes said patches. This behavior is wanted, because it helps us reduce errors caused by patches that are malformed, not applied correctly, not wanted, and/or various errors.',

            'note' => 'The script will show any compilation error, as well as showing the true compilation time, not considering patches and so on.',

            'desc3' => "Once the script finishes its execution, thanks to <code>installkernel</code> the initramfs will be generated, and the bootloader will be updated. With my configuration these correspond, respectively, to <code>dracut</code> and <code>grub</code>. Obviously it'll be your responsibility to configure <code>installkernel</code> before trying to install the Kernel.",
        ],
    ],

    // Extra
    'extra' => [
        'desc' => "This section specifies any extra steps to take after Kernel compilation, that do not depend on the script. Using the script, it won't be necessary to manually update the initramfs, nor the bootloader, because they'll be automatically updated (see above).",

        // V4L2loopback
        'v4l2' => [
            'title' => 'V4L2loopback',
            'desc' => 'The script will automatically install this module for the compiled Kernel version. The only step you need to take is add the module settings, because the script does not check whether they exist or not.',
            'desc2' => 'Modify <code>/etc/modprobe.d/v4l2loopback.conf</code>, and add the following:',
            'desc3' => 'Here you can modify <code>card_label</code> to set the device name, whenever necessary, for example if you want to hide the fact this is a virtual device, or if you simply would like a better name.',
        ],

        // Initramfs
        'initramfs' => [
            'title' => 'Initramfs',
            'desc' => "To run the Kernel an initramfs is necessary. To generate it, I'll use dracut.",
            'desc2' => "First of all, make sure you configured dracut. For example, here's my <code>/etc/dracut.conf</code>:",
            'desc3' => "It's sufficient to execute the following command as root:",
            'desc4' => 'Replace <code>6.8.2-gentoo</code> with your Kernel version. Be careful to the <code>-f</code> flag: it forces the initramfs generation, even if it already exists for the chosen Kernel.',
            'desc5' => "The initramfs will be available under <code>/boot</code>, together with the previously compiled Kernel's files.",
        ],

        // Bootloader
        'bootloader' => [
            'title' => 'Bootloader',
            'desc' => "To boot our new Kernel, we need to configure the bootloader. <strong>In this section we'll only see GRUB2</strong>.",
            'desc2' => 'Most users, at this point, will surely already have a working system, and a configured bootloader. This fact allows us to just update the bootloader config, without modifying any other files.',
            'desc3' => 'So, you just need to run as root:',
            'desc4' => 'This command will tell us the available Kernels (and any other OS), that will be available once we reboot our system, in addition to telling us which microcode(s) were found.',
        ],
    ],

    // Links
    'links' => [
        'esp' => 'https://en.wikipedia.org/wiki/EFI_system_partition',
        'rootfs' => 'https://www.kernel.org/doc/html/latest/filesystems/ramfs-rootfs-initramfs.html#what-is-rootfs',
        'nonfree' => 'https://www.gnu.org/philosophy/free-hardware-designs.html',
        'microcode' => 'https://wiki.gentoo.org/wiki/Microcode',
        'installkernel' => 'https://packages.gentoo.org/packages/sys-kernel/installkernel',
        'distcc' => 'https://www.distcc.org',
        'ccache' => 'https://ccache.dev',
        'v4l2loopback' => 'https://github.com/umlaeute/v4l2loopback',
    ],
];
