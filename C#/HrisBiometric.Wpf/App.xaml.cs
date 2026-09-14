using System.Windows;

namespace HrisBiometric.Wpf;

public partial class App : Application
{
    protected override void OnStartup(StartupEventArgs e)
    {
        base.OnStartup(e);

        // Compose the singleton graph: device (the only place that talks to libzkfpcsharp)
        // feeds the AttendanceService which the ViewModels observe.
        IFingerprintDevice device = new ZkFingerprintDevice();
        IAttendanceService attendance = new AttendanceService(device);
        attendance.AttachDevice(device);

        var mainVm = new MainViewModel();
        var shell = new MainWindow
        {
            DataContext = new ShellViewModel(
                device,
                attendance,
                mainVm,
                new DashboardViewModel(attendance),
                new AttendanceViewModel(device, attendance),
                new EmployeeListViewModel(attendance),
                new FingerprintRegistrationViewModel(device, attendance),
                new AttendanceHistoryViewModel(attendance),
                new DeviceManagementViewModel(device),
                new SettingsViewModel())
        };

        MainWindow = shell;
        shell.Show();
    }
}
