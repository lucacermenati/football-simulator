import Edit from "@/Icons/Edit";
import PlusCircle from "@/Icons/PlusCircle";
import Trash from "@/Icons/Trash";
import View from "@/Icons/View";

const iconsByLabel = {
    view: View,
    edit: Edit,
    add: PlusCircle,
    delete: Trash,
};

export default function Actions({ actions, item }) {
    return (
        <div className="flex space-x-4">
            {actions.map((action, index) => (
                <div
                    key={index}
                    className="flex items-center space-x-2 cursor-pointer text-primaryRed-800"
                    onClick={() => action.onClick && action.onClick(item)}
                >
                    {(() => {
                        const Icon =
                            iconsByLabel[String(action.icon).toLowerCase()];

                        return Icon ? (
                            <Icon title={action.icon} className="w-6 h-6" />
                        ) : null;
                    })()}
                </div>
            ))}
        </div>
    );
}
